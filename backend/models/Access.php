<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "access".
 *
 * @property integer $id
 * @property string $title
 * @property string $urls
 * @property integer $status
 * @property string $updated_time
 * @property string $created_time
 */
class Access extends \yii\db\ActiveRecord
{

    public $child;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['urls'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'child' => 'Child',
            'title' => 'Title',
            'urls' => 'Urls',
            'status' => 'Status',
            'updated_at' => 'Updated Time',
            'created_at' => 'Created Time',
        ];
    }
}
