<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apartment".
 *
 * @property int $Apart_Id รหัสอพาร์ตเมนต์
 * @property string $Staff_Id รหัสประจำตัวประชาชนผู้ดูแลอพารต์เมนต์
 * @property string $Name ชื่ออพาร์ตเมนต์
 * @property string $Address ที่อยู่
 * @property string $Tel เบอร์โทรศัพท์
 * @property string $Email อีเมล
 * @property int $NumRoom จำนวนห้องพัก
 * @property int $NumFloor จำนวนชั้น
 * @property string $Status สถานะ
 *
 * @property Staff $staff
 * @property FinancialApartment[] $financialApartments
 * @property Room[] $rooms
 * @property Roomtype[] $rooms0
 * @property Roomtype[] $roomtypes
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
            [['Apart_Id', 'Staff_Id', 'Name', 'Address', 'Tel', 'Email', 'NumRoom', 'NumFloor', 'Status'], 'required'],
            [['Apart_Id', 'NumRoom', 'NumFloor'], 'integer'],
            [['Name', 'Address'], 'string'],
            [['Staff_Id'], 'string', 'max' => 13],
            [['Tel'], 'string', 'max' => 10],
            [['Email'], 'string', 'max' => 50],
            [['Status'], 'string', 'max' => 1],
            [['Staff_Id'], 'unique'],
            [['Staff_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['Staff_Id' => 'Staff_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
       return [
            'Apart_Id' => 'รหัสอพาร์ตเมนต์',
            'Staff_Id' => 'รหัสผู้ดูแลอพาร์ตเมนต์',
            'Name' => 'ชื่อ',
            'Address' => 'ที่อยู่',
            'Tel' => 'เบอร์โทรศัพท์',
            'Email' => 'อีเมล์',
            'NumRoom' => 'จำนวนห้อง',
            'NumFloor' => 'จำนวนชั้น',
            'Status' => 'สถานะ ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['Staff_Id' => 'Staff_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinancialApartments()
    {
        return $this->hasMany(FinancialApartment::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms0()
    {
        return $this->hasMany(Roomtype::className(), ['Room_Id' => 'Room_Id'])->viaTable('room', ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomtypes()
    {
        return $this->hasMany(Roomtype::className(), ['Apart_Id' => 'Apart_Id']);
    }
}
