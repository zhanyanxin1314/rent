<?php

namespace backend\controllers;

use Yii;
use backend\controllers\common\BaseController;
use backend\models\Access;
use yii\data\Pagination;

class AccessController extends BaseController
{

    public function actionIndex()
    {
	$list = Access::find()->orderBy([ 'id' => SORT_DESC ])->all();
	$treelist = $this->actionCate($list,array());
	return $this->render("index",[
		'models' => $treelist
	]); 
    } 
    public function actionCreateAccess()
    {
		if( \Yii::$app->request->isGet ){
		
			$all = Access::find()->where([ 'status' => 1 ])->all();
			$alllist = $this->actionCate($all,array());
			$id = $this->get("id",0);
			$info = [];
			if( $id ){
				$info = Access::find()->where([ 'status' => 1 ,'id' => $id ])->one();
			}
			return $this->render('_createaccess',[
				'info' => $info,
				'alllist'=> $alllist
			]);
		}

		$id = intval( $this->post("id",0) );
		$pid = intval( $this->post("pid",0) );
		$title = trim( $this->post("title","") );
		$urls = trim( $this->post("urls","") );
		$date_now = time();
		if( mb_strlen($title,"utf-8") < 1 || mb_strlen($title,"utf-8") > 20 ){
			return $this->renderJSON([],'请输入权限标题!',-1);
		}

		if( !$urls ){
			return $this->renderJSON([],'请输入合法的Urls!',-1);
		}

		$urls = explode("\n",$urls);
		if( !$urls ){
			return $this->renderJSON([],'请输入合法的Urls!',-1);
		}

		//查询同一标题的是否存在
		$has_in = Access::find()->where([ 'title' => $title ])->andWhere([ '!=','id',$id ])->count();
		if( $has_in ){
			return $this->renderJSON([],'该权限标题已存在!',-1);
		}

		//查询指定id的权限
		$info = Access::find()->where([ 'id' => $id ])->one();
		if( $info ){//如果存在则是编辑
			$model_access = $info;
		}else{//不存在就是添加
			$model_access = new Access();
			$model_access->status = 1;
			$model_access->created_at =  $date_now;
		}
		$model_access->pid = $pid;
		$model_access->title = $title;
		$model_access->urls = json_encode( $urls );//json格式保存的
		$model_access->updated_at = $date_now;
		$model_access->save(0);
		
		return $this->renderJSON([],'操作成功!');	
    }
    public function actionCate(&$info, $child, $pid = 0)
    {
    	$child = array();
    	if(!empty($info)){
        	foreach ($info as $k => &$v) {
            		if($v['pid'] == $pid){
                		$v['child'] = $this->actionCate($info, $child, $v['id']);
                		$child[] = $v;
                		unset($info[$k]);
            		}
        	}
    }
    return $child;
   }
   /*
    *角色分配权限
    */
   public function actionAssignItem($name)
   {
	$name = htmlspecialchars($name);
	$auth = Yii::$app->authManager;
	//获取当前角色
	$parent = $auth->getRole($name);
	if (Yii::$app->request->isPost) {
		$post = Yii::$app->request->post();
			if (Rbac::addChild($post['children'], $name)) {
				Yii::$app->session->setFlash('info', '分配成功');
				return $this->redirect(['rbac/index']);
			}	
	}
	//获取对应角色 下的权限
	$children = Rbac::getChildrenByName($name); //获取所有角色 并拼成数组
	$roles = Rbac::getOptions($auth->getRoles(), $parent);
	//获取所有权限 并拼成数组
	$permissions = Rbac::getOptions($auth->getPermissions(), $parent);
	return $this->render('_assignitem', ['parent' => $name, 'roles' => $roles, 'permissions' => $permissions, 'children' => $children]);
}
}
