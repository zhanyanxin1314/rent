<?php
/**
 * Class BaseController
 */

namespace backend\controllers\common;


use backend\models\Access;
//use app\models\AppAccessLog;
use backend\models\RoleAccess;
use backend\models\User;
use backend\models\UserRole;

use backend\services\UrlService;
use yii\web\Controller;
use Yii;
//是以后所有控制器的基类，并且集成常用公用方法
class BaseController extends  Controller{

	protected $auth_cookie_name = "zhangyxcl";
	protected $current_user = null;//当前登录人信息
	protected $allowAllAction = [
		'user/login',
		'user/vlogin'
	];

	public $ignore_url = [
		'error/forbidden' ,
		'user/vlogin',
		'user/login'
	];

	public $privilege_urls = [];//保存去的权限链接
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
}
