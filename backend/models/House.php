<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $is_admin
 * @property integer $status
 * @property string $updated_time
 * @property string $created_time
 */
class House extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'house';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hsort', 'hstatus'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['hname'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hid' => 'ID',
            'hname' => 'Hame',
            'hstatus' => 'Status',
            'updated_at' => 'Updated Time',
            'created_at' => 'Created Time',
        ];
    }
}
