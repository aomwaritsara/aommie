<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $Apart_Id รหัสอพาร์ตเมนต์
 * @property string $Room_Id รหัสห้อง
 * @property string $Cus_Id รหัสประจำตัวประชาชนลูกค้า
 * @property int $Deposit
 * @property string $Booking_Date วันที่จองห้องพัก
 * @property string $Status สถานะ
 * @property string $Datestatus วันที่เปลี่ยนสถานะ
 *
 * @property Room $apart
 * @property Room $room
 * @property Customer $cus
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'Deposit', 'Booking_Date', 'Status', 'Datestatus'], 'required'],
            [['Apart_Id', 'Deposit'], 'integer'],
            [['Booking_Date', 'Datestatus'], 'safe'],
            [['Room_Id'], 'string', 'max' => 10],
            [['Cus_Id'], 'string', 'max' => 13],
            [['Status'], 'string', 'max' => 1],
            [['Apart_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['Apart_Id' => 'Apart_Id']],
            [['Room_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['Room_Id' => 'Room_Id']],
            [['Cus_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['Cus_Id' => 'Cus_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
       {
       return [
            'Apart_Id' => 'รหัสอพาร์ตเมนต์',
            'Room_Id' => 'รหัสห้องพัก',
            'Cus_Id' => 'รหัสประจำตัวประชาชน',
            'Deposit' => 'เงินมัดจำ',
            'Booking_Date' => 'วันที่จอง',
            'Status' => 'สถานะการจอง ',
            'Datestatus' => 'วันที่เปลี่ยนสถานะ',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApart()
    {
        return $this->hasOne(Room::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCus()
    {
        return $this->hasOne(Customer::className(), ['Cus_Id' => 'Cus_Id']);
    }
}
