<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\web\Response;
use yii\web\Request;
use yii\db\Command;

class ManageController extends \yii\web\Controller
{
    /*
     * 管理员列表
     */
    public function actionList()
    {
	$user = New User();
        $list  = $user->findUser();

        return $this->render('list',[
             'list'=> $list
	]);
    }

    /*
     * 管理员-添加
     */
    public function actionCreate()
    {
	
	//$user = New User();
        //$list  = $user->findUser();

       return $this->render('create');
    }

    /* 
     * 管理员添加
     */
    public function actionAdd()
    {
	\Yii::$app->response->format = Response::FORMAT_JSON;


	$username = Yii::$app->request->post('username');
	$result = Yii::$app->db->createCommand()->insert('user', [  
            'username' => 'admin',
	    'auth_key' => 'ddddddd',
	    'password_hash'=>'password',
	    'status'=>10,
	    'email'=>'1111@qq.com',
	    'mobile'=>15201251947,
	    'created_at'=>time(),
	    'updated_at'=>time(),
        ])->execute();  


		return ['code'=>'success'];

	
    }

}
