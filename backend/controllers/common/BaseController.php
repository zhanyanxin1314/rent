<?php
/**
 * Class BaseController
 */

namespace backend\controllers\common;


use backend\models\Access;
use backend\models\AppAccessLog;
use backend\models\RoleAccess;
use backend\models\User;
use backend\models\UserRole;

use backend\services\UrlService;
use yii\web\Controller;
use Yii;

class BaseController extends  Controller{

	protected $current_user = null;
	protected $allowAllAction = [
		'site/login',
		'site/logout'
	];

	public $ignore_url = [
		'error/forbidden' ,
		'site/logout',
		'site/login',
		'site/index'
	];

	public $privilege_urls = [];//保存去的权限链接

	public function beforeAction($action) {
		
		$login_status = $this->checkLoginStatus();
	;
		if ( !$login_status && !in_array( $action->uniqueId,$this->allowAllAction )  ) {
				$this->redirect( UrlService::buildUrl("/site/login") );//返回到登录页面
			return false;
		}
		if( !$this->checkPrivilege( $action->getUniqueId() ) ){
			$this->redirect( UrlService::buildUrl( "/error/forbidden" ) );
			return false;
		}
		return true;
	}
	//检查是否有访问指定链接的权限
	public function checkPrivilege( $url ){
		//如果是超级管理员 也不需要权限判断
		if( $this->current_user && $this->current_user['is_admin'] ){
			return true;
		}

		//有一些页面是不需要进行权限判断的
		if( in_array( $url,$this->ignore_url ) ){
			return true;
		}

		return in_array( $url, $this->getRolePrivilege( ) );
	}

		/*
	* 获取某用户的所有权限
	* 取出指定用户的所属角色，
	* 在通过角色 取出 所属 权限关系
	* 在权限表中取出所有的权限链接
	*/
	public function getRolePrivilege($uid = 0){
		if( !$uid && $this->current_user ){
			$uid = $this->current_user->id;
		}

		if( !$this->privilege_urls ){
			$role_ids = UserRole::find()->where([ 'uid' => $uid ])->select('role_id')->asArray()->column();
			if( $role_ids ){
				//在通过角色 取出 所属 权限关系
				$access_ids = RoleAccess::find()->where([ 'role_id' =>  $role_ids ])->select('access_id')->asArray()->column();
				//在权限表中取出所有的权限链接
				$list = Access::find()->where([ 'id' => $access_ids ])->all();
				if( $list ){
					foreach( $list as $_item  ){
						$tmp_urls = @json_decode(  $_item['urls'],true );
						$this->privilege_urls = array_merge( $this->privilege_urls,$tmp_urls );
					}
				}
			}
		}
		return $this->privilege_urls ;
	}
	//用户相关信息生成加密校验码函数
	public function createAuthToken($uid,$name,$email,$user_agent){
		return md5($uid.$name.$email.$user_agent);
	}
	//统一获取post参数的方法
	public function post($key, $default = "") {
		return Yii::$app->request->post($key, $default);
	}

	//统一获取get参数的方法
	public function get($key, $default = "") {
		return Yii::$app->request->get($key, $default);
	}

	/*
	 * 封装json返回值，主要用于js ajax 和 后端交互返回格式
	 * data:数据区 数组
	 * msg: 此次操作简单提示信息
	 * code: 状态码 200 表示成功，http 请求成功 状态码也是200
	 */
	public function renderJSON($data=[], $msg ="ok", $code = 200){
		header('Content-type: application/json');//设置头部内容格式
		echo json_encode([
			"code" => $code,
			"msg"   =>  $msg,
			"data"  =>  $data,
			"req_id" =>  uniqid(),
		]);
		return Yii::$app->end();//终止请求直接返回
	}

	//验证登录是否有效，返回 true or  false
	protected function checkLoginStatus(){
		$session = Yii::$app->session;
		$uid =  $session->get('zfuid');
	
		if(!$uid){
			return false;
		}

		if( $uid ){
			$userinfo = User::findOne([ 'id' => $uid ]);
			if(!$userinfo){
				return false;
			}
			$this->current_user = $userinfo;
			$view = Yii::$app->view;
			$view->params['current_user'] = $userinfo;
			return true;
		}
		return false;
	}	
	//设置登录态cookie
	public  function createLoginStatus($userinfo){
		$auth_token = $this->createAuthToken($userinfo['id'],$userinfo['username'],$userinfo['email'],$_SERVER['HTTP_USER_AGENT']);
		$cookies = Yii::$app->response->cookies;
		$cookies->add(new \yii\web\Cookie([
			'name' => $this->auth_cookie_name,
			'value' => $auth_token."#".$userinfo['id'],
		]));
	}
}
