<?php

namespace backend\controllers;

class HouseController extends \yii\web\Controller
{
    public function actionList()
    {
        return $this->render('list');
    }

}
