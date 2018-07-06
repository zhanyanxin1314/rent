<?php

namespace api\modules\v1\controllers;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;
use api\models\Goods;
use yii\web\Request;
class GoodsController extends ActiveController
{

    public $modelClass = 'api\models\Goods';
   
    public function behaviors()  
    {  
        $behaviors = parent::behaviors();  
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;  
        return $behaviors;  
    }
     
    public function actionDemo()
    {
        $goodsModel = new Goods();

        $result = $goodsModel->getAllGoods();

        return [
	        'code'=>true,
		'message'=>$result
        ];	
    }
    
    public function actionDemo1()
    {
	$request = Yii::$app->request;
        
        $goodsModel = new Goods();

        $result = $goodsModel->getOneGoods($request->get('id'));

        return [
	        'code'=>true,
		'message'=>$result
        ];	
    }
}
