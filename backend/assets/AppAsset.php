<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
	'css/rent/H-ui.min.css',
        'css/rent/H-ui.admin.css',
        'css/rent/H-ui.login.css',
        'css/rent/style.css',
	'css/rent/iconfont/iconfont.css',
        'css/rent/skin.css'
    ];
    public $js = [
	//'js/jquery.min.js',
	'js/layer/2.4/layer.js',
        'js/H-ui.min.js',
        'js/H-ui.admin.js',
        'js/jquery.validate.min.js',
	'js/login.js',
	'js/jquery.contextmenu.r2.js',
	'js/WdatePicker.js',
	'js/jquery.dataTables.min.js',
	'js/laypage/1.2/laypage.js', 
	'js/jquery.validation/1.14.0/jquery.validate.js',
	'js/jquery.validation/1.14.0/validate-methods.js',
	'js/jquery.validation/1.14.0/messages_zh.js'
  
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
   ];
}
