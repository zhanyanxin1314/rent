<?php

namespace backend\controllers;
use backend\controllers\common\BaseController;

class HouseController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
