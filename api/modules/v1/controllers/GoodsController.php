<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use api\models\Access;
use yii\web\Request;

class GoodsController extends Controller
{

    public $modelClass = 'api\models\Access';
   
    public function behaviors()  
    {  
        $behaviors = parent::behaviors();  
        $behaviors['corsFilter'] = [
		'class' => \yii\filters\Cors::className(),		
		'cors' => [
                'Origin' => ['http://120.79.212.63:8093'],
                'Access-Control-Request-Method' => ['POST', 'PUT'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Headers' => ['X-Wsse'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];
        $behaviors['contentNegotiator'] = [
		'class' => ContentNegotiator::className(),
                'formats' => [
			'application/json' => Response::FORMAT_JSON
                ]

        ];
        return $behaviors;  
    }
     
    public function actionDemo()
    {
        $goodsModel = new Access();

        $result = $goodsModel->getAllAccess();

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
    public function actionDemo2()
    {
        $request = Yii::$app->request;
	$name = $request->post('name');

        return [
	        'code'=>true,
		'message'=>$name
        ];	
    }
}
