<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property string $Staff_Id
 * @property string $Username
 * @property string $Password
 * @property string $Name
 * @property string $Tel
 * @property string $E-mail
 * @property string $Address
 * @property string $Status
 * @property string $Type
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Staff_Id', 'Username', 'Password', 'Name', 'Tel', 'E-mail', 'Address', 'Status', 'Type'], 'required'],
            [['Address'], 'string'],
            [['Staff_Id'], 'string', 'max' => 13],
            [['Username', 'Password'], 'string', 'max' => 20],
            [['Name'], 'string', 'max' => 40],
            [['Tel'], 'string', 'max' => 10],
            [['E-mail'], 'string', 'max' => 50],
            [['Status', 'Type'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Staff_Id' => 'Staff  ID',
            'Username' => 'Username',
            'Password' => 'Password',
            'Name' => 'Name',
            'Tel' => 'Tel',
            'E-mail' => 'E Mail',
            'Address' => 'Address',
            'Status' => 'Status',
            'Type' => 'Type',
        ];
    }
}
