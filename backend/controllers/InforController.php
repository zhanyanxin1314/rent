<?php

namespace backend\controllers;

use Yii;
use backend\controllers\common\BaseController;
use backend\models\Infor;
use yii\data\Pagination;
use backend\services\UrlService;

class InforController extends BaseController
{

    public function actionIndex()
    {
	$list = Infor::find()->orderBy([ 'id' => SORT_DESC ])->all();

	return $this->render("index",[
		'models' => $list
	]); 
    } 
    public function actionCreateInfor()
    {	
		if( \Yii::$app->request->isGet ){
			$id = $this->get("id",0);
			$info = [];
			if( $id ){
				$info = Infor::find()->where([ 'id' => $id ])->one();
			}
			return $this->render("_createinfor",[
				"info" => $info
			]);
		}

		$id = $this->post("id",0);
		$title = $this->post("title","");
		$keywords = $this->post("keywords","");
		$source = $this->post("source","");
		$sort = $this->post("sort","");
		$date_now = time();
		if(empty($title)){
			return $this->renderJSON([],"文章标题不能为空!",-1);
		}
		$res = Infor::find()
			->where([ 'title' => $title ])->andWhere([ '!=','id',$id ])
			->one();
		if( $res ){
			return $this->renderJSON([],"该文章标题已存在，请输入其他的文章标题",-1);
		}

		$info = Infor::find()->where([ 'id' => $id ])->one();
		if( $info ) {
			$infor_model = $info;
		} else {
			$infor_model = new Infor();
			$infor_model->created_at = $date_now;
		}
		$infor_model->title = $title;
		$infor_model->keywords = $keywords;
		$infor_model->source = $source;
		$infor_model->sort = $sort;
		$infor_model->updated_at = $date_now;

		$infor_model->save(0);
		return $this->renderJSON([],"操作成功~~",200);
    }
}
