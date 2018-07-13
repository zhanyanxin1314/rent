<?php

namespace common\menu;
use backend\models\Access;
/*
 * 自定义全局公共方法
 */
class tools{
    public static function getMenu(){
        $info = Access::find()->where([ 'status' => 1 ])->all();
	$res = self::actionCate($info,array());
	return $res;
    }
    public static function actionCate(&$info, $child, $pid = 0)
    {
        $child = array();
        if(!empty($info)){
                foreach ($info as $k => &$v) {
                        if($v['pid'] == $pid){
                                $v['child'] = self::actionCate($info, $child, $v['id']);
                                $child[] = $v;
                                unset($info[$k]);
                        }
                }
    }
    return $child;
   }

}
