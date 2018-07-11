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
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_admin', 'status'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['username'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 30],
            [['password_hash'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Name',
            'email' => 'Email',
            'is_admin' => 'Is Admin',
            'status' => 'Status',
            'password_hash' => 'Password_Hash',
            'updated_at' => 'Updated Time',
            'created_at' => 'Created Time',
        ];
    }
}
