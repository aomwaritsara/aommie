<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apartment".
 *
 * @property integer $Apart_Id
 * @property string $Name
 * @property string $Address
 * @property string $Tel
 * @property string $Email
 * @property integer $NumRoom
 * @property integer $NumFloor
 * @property string $Status
 */
class Apartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apartment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Name', 'Address', 'Tel', 'Email', 'NumRoom', 'NumFloor', 'Status'], 'required'],
            [['Apart_Id', 'NumRoom', 'NumFloor'], 'integer'],
            [['Name', 'Address'], 'string'],
            [['Tel'], 'string', 'max' => 10],
            [['Email'], 'string', 'max' => 50],
            [['Status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Apart_Id' => 'รหัสอพาร์ตเมนต์',
            'Name' => 'ชื่ออพาร์ตเมนต์',
            'Address' => 'ที่อยู่',
            'Tel' => 'เบอร์โทรศัพท์',
            'Email' => 'อีเมลล์',
            'NumRoom' => 'จำนวนห้องพัก',
            'NumFloor' => 'จำนวนชั้น',
            'Status' => 'สถานะ',
        ];
    }
}
