<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
	'session'=>array(
            'class' => 'yii\web\Session',
	    'cookieParams' => ['lifetime' => 7 * 24 *60 * 60]
        ),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	'authManager' => [
            'class' => 'yii\rbac\DbManager',//使用DB 数据更安全
	    'itemTable' => '{{%auth_item}}',
            'itemChildTable' => '{{%auth_item_child}}',
            'assignmentTable' => '{{%auth_assignment}}',
            'ruleTable' => '{{%auth_rule}}',
            'defaultRoles' => ['default'],
        ],
    ],
];
