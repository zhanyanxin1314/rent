<?php
/**
 * Class UserController
 */

namespace backend\controllers;

use Yii;
use backend\controllers\common\BaseController;
use backend\models\Role;
use backend\models\User;
use backend\models\UserRole;
use backend\services\UrlService;

class UserController extends  BaseController{

	//用户列表
	public function actionIndex(){
		$user_list = User::find()->where([ 'status' => 10 ])->orderBy([ 'id' => SORT_DESC ])->all();
		$set_flag = $this->checkPrivilege( "user/create-user" );
		return $this->render('index',[
			'list' => $user_list,
			'set_flag' => $set_flag
		]);
	}

	/*
	 * 添加或者编辑用户页面
	 * get 展示页面
	 * post 处理添加或者编辑用户
	 */
	public function actionCreateUser(){
		if( \Yii::$app->request->isGet ){
			$id = $this->get("id",0);
			$info = [];
			if( $id ){
				$info = User::find()->where([ 'status' => 10 ,'id' => $id ])->one();
			}
			$role_list = Role::find()->orderBy( [ 'id' => SORT_DESC ])->all();
			$user_role_list = UserRole::find()->where([ 'uid' => $id ])->asArray()->all();
			$related_role_ids = array_column($user_role_list,"role_id");
			return $this->render('_createuser',[
				'info' => $info,
				'role_list' => $role_list,
				"related_role_ids" => $related_role_ids
			]);
		}

		$id = intval( $this->post("id",0) );
		$name = trim( $this->post("username","") );
		$password = trim( $this->post("password_hash","") );
		$email = trim( $this->post("email","") );
	        $password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
		
		$role_ids = $this->post("role_ids",[]);//选中的角色id
		$date_now = time();

		if( mb_strlen($name,"utf-8") < 1 || mb_strlen($name,"utf-8") > 20 ){
			return $this->renderJSON([],'请输入管理员名字~~',-1);
		}

		if( !filter_var( $email , FILTER_VALIDATE_EMAIL) ){
			return $this->renderJSON([],'请输入正确的邮箱~~',-1);
		}

		$has_in = User::find()->where([ 'email' => $email ])->andWhere([ '!=','id',$id ])->count();
		if( $has_in ){
			return $this->renderJSON([],'该邮箱已存在~~',-1);
		}
		
		$info = User::find()->where([ 'id' => $id ])->one();
		if( $info ) {
			$model_user = $info;
		} else {
			$model_user = new User();
			$model_user->status = 10;
			$model_user->created_at =  $date_now;
			$model_user->is_admin = 0;
		}
		$model_user->username = $name;
		if(empty($password)) {
			$model_user->password_hash = $info['password_hash'];
		} else {
			$model_user->password_hash = $password_hash;
		}
		$model_user->email = $email;
		$model_user->updated_at = $date_now;
		if( $model_user->save(0) ){
			$user_role_list = UserRole::find()->where([ 'uid' => $model_user->id ])->all();
			$related_role_ids = [];
			if( $user_role_list ){
				foreach( $user_role_list as $_item ){
					$related_role_ids[] = $_item['role_id'];
					if( !in_array( $_item['role_id'],$role_ids ) ){
						$_item->delete();
					}
				}
			}
			if ( $role_ids ){
				foreach( $role_ids as $_role_id ){
					if( !in_array( $_role_id ,$related_role_ids ) ){
						$model_user_role = new UserRole();
						$model_user_role->uid = $model_user->id;
						$model_user_role->role_id = $_role_id;
						$model_user_role->created_at = $date_now;
						$model_user_role->save(0);
					}
				}
			}
		}
		return $this->renderJSON([],'操作成功~~');
	}
	//用户登录页面
	public function actionLogin(){
		return $this->render("login",[
			'host' => $_SERVER['HTTP_HOST']
		]);
	}

	//伪登录业务方法,所以伪登录功能也是需要有auth_token
	public function actionVlogin(){
		$uid = $this->get("uid",0);
		$reback_url = UrlService::buildUrl("/");
		if( !$uid ){
			return $this->redirect( $reback_url );
		}
		$user_info = User::find()->where([ 'id' => $uid ])->one();
		if( !$user_info ){
			return $this->redirect( $reback_url );
		}
		//cookie保存用户的登录态,所以cookie值需要加密，规则：user_auth_token + "#" + uid
		$this->createLoginStatus( $user_info );
		return $this->redirect( $reback_url );
	}
}
