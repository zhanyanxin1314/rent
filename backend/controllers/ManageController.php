<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\web\Response;
use yii\web\Request;

class ManageController extends \yii\web\Controller
{
     const STATUS = 10;
     const VALIDATE_SUCCESS = 'zfsu';
     const VALIDATE_ERROR = 'zfer';

    /*
     * 管理员列表
     */
    public function actionList()
    {
	$user = New User();
        $list  = $user->findUser();

        return $this->render('user/list',[
             'list'=> $list
	]);
    }

    /*
     * 管理员-添加
     */
    public function actionCreate()
    {
	
       return $this->render('user/create');
    }

    /* 
     * 管理员添加
     */
    public function actionAdd()
    {
	\Yii::$app->response->format = Response::FORMAT_JSON;

        $username = Yii::$app->request->post('username');

	$password = Yii::$app->request->post('password_hash');	

        $password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);

	$result =Yii::$app->db->createCommand()->insert('user', [  
            'username' => $username,
	    'auth_key' => '', 
	    'password_hash'=>$password_hash,
	    'status'=>self::STATUS,
	    //'email'=>$email,
	    //'mobile'=>$mobile,
	    'created_at'=>time(),
	    'updated_at'=>time(),
        ])->execute();  

	if($result){

	    return ['code'=>self::VALIDATE_SUCCESS];

        } else {
		
	    return ['code'=>self::VALIDATE_ERROR];
	
	}
	
    }

    /*
     * 角色列表
     */
    public function actionRole()
    {
	//$user = New User();
        //$list  = $user->findUser();

        //return $this->render('list',[
          //   'list'=> $list
	//]);
	return $this->render('role/list');
    }
	
    /*
     * 添加角色
     */
    public function actionCreateRole()
    {
	return $this->render('role/create');
    }
   
}
