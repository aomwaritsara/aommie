<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property string $Password

 */
class FormPassword extends \yii\db\ActiveRecord
{

    public $password;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password'], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password', 'รหัสผ่าน',

        ];
    }
}