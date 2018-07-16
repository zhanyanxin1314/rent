<?php

namespace backend\controllers;
use backend\controllers\common\BaseController;
use backend\models\House;

class HouseController extends BaseController
{
    public function actionIndex()
    {
	$house_list = House::find()->where([ 'hstatus' => 10 ])->orderBy([ 'hid' => SORT_DESC ])->all();
        return $this->render('index',[
             'list' => $house_list
	]);
    }
    /*
       * 添加或者编辑用户页面
       * get 展示页面
       * post 处理添加或者编辑用户
       */
     public function actionCreateHouse(){
	  if( \Yii::$app->request->isGet ){
	          $id = $this->get("hid",0);
                  $info = [];
                  if( $id ){
                       $info = House::find()->where([ 'status' => 10 ,'hid' => $id ])->one();
                  }

	          return $this->render('_createhouse',[
                      'info' => $info,
		  ]);
          }
	  $hid = intval( $this->post("hid",0) );
	  $info = House::find()->where([ 'hid' => $hid ])->one();
	  if( $info ) {
                   $model_house = $info;
          } else {
                   $model_house = new House();
                   $model_house->hstatus = 10;
                   $model_house->created_at =  time();
         }
	 $model_house->hname = trim( $this->post("hname","") );
         $model_house->hrent = trim( $this->post("hrent","") );
         $model_house->hfloor = trim( $this->post("hfloor","") );
         $model_house->htoward = trim( $this->post("htoward","") );
         $model_house->hdeposit = trim( $this->post("hdeposit","") );
         $model_house->hdecorate = trim( $this->post("hdecorate","") );
         $model_house->hmodel = trim( $this->post("hmodel","") );
         $model_house->helevator = trim( $this->post("helevator","") );
         $model_house->hsort = trim( $this->post("hsort","") );
         $model_house->updated_at = time();
         if( $model_house->save(0) ){
		return $this->renderJSON([],'操作成功~~');
	 }

     }
}
