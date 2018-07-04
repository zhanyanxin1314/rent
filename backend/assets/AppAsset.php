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
	'js/jquery.min.js',
	'js/layer.js',
        'js/H-ui.min.js',
        'js/H-ui.admin.js',
        'js/jquery.validate.min.js',
	'js/login.js',
	'js/jquery.contextmenu.r2.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
   ];
}
