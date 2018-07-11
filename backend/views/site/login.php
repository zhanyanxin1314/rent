<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '租房网-后台';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <?php $form = ActiveForm::begin([ 'id' => 'da-login-form','class'=>'form form-horizontal']); ?>
      <div class="row cl">
        <label class="form-label col-xs-3"><i style="margin-left:120px" class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <?php echo Html::activeTextInput($model, 'username',['id'=>'da-login-username','placeholder'=>'账户','class'=>'input-text size-L'])?>
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i style="margin-left:120px" class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
           <?php echo Html::activePasswordInput($model, 'password',['id'=>'da-login-password','placeholder'=>'密码','class'=>'input-text size-L'])?>
        </div>
      </div>
      <div class="row cl" style="text-align:center;">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          &nbsp;&nbsp;&nbsp;
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
     <?php ActiveForm::end(); ?>
  </div>
</div>
