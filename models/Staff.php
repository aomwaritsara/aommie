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
 * @property string $Email
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
            [['Staff_Id', 'Username', 'Password', 'Name', 'Tel', 'Email', 'Address', 'Status', 'Type'], 'required'],
            [['Address'], 'string'],
            [['Staff_Id'], 'string', 'max' => 13],
            [['Username', 'Password'], 'string', 'max' => 20],
            [['Name'], 'string', 'max' => 40],
            [['Tel'], 'string', 'max' => 10],
            [['Email'], 'string', 'max' => 50],
            [['Status', 'Type'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Staff_Id' => 'รหัสประจำตัวประชาชน',
            'Username' => 'ชื่อผู้ใช้',
            'Password' => 'รหัสผ่าน',
            'Name' => 'ชื่อ-นามสกุล',
            'Tel' => 'เบอร์โทรศัพท์',
            'Email' => 'อีเมล',
            'Address' => 'ที่อยู่',
            'Status' => 'สถานะ',
            'Type' => 'ประเภทผู้ดูแล',
        ];
    }
}
