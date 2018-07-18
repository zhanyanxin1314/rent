<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string $name
 */
class Access extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access';
    }
    
    public function getAllAccess()
    {
	return Access::find()->all();
    }

    public function getOneAccess($id)
    {
	return Access::findOne($id);
    }
}
