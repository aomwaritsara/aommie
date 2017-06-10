<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rental".
 *
 * @property int $Apart_Id รหัสอพาร์ตเมนต์
 * @property string $Room_Id รหัสห้องพัก
 * @property string $Cus_Id รหัสประจำตัวประชาชน
 * @property string $StartDate
 * @property string $DateFrom วันที่เริ่มเช่า
 * @property string $DateTo วันที่สิ้นสุดการเช่า
 * @property int $NumCus จำนวนผู้เข้าพัก
 * @property int $Deposit จำนวนเงินประกันห้อง
 * @property string $Status สถานะการเช่า
 *
 * @property History[] $histories
 * @property History[] $histories0
 * @property History[] $histories1
 * @property History $history
 * @property Room $apart
 * @property Room $room
 * @property Customer $cus
 * @property Serviceofrental[] $serviceofrentals
 * @property Serviceofrental[] $serviceofrentals0
 */
class Rental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'StartDate', 'DateFrom', 'NumCus', 'Deposit', 'Status'], 'required'],
            [['Apart_Id', 'NumCus', 'Deposit'], 'integer'],
            [['StartDate', 'DateFrom', 'DateTo'], 'safe'],
            [['Room_Id'], 'string', 'max' => 10],
            [['Cus_Id'], 'string', 'max' => 13],
            [['Status'], 'string', 'max' => 1],
            [['DateFrom'], 'unique'],
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
            'Apart_Id' => 'Apart  ID',
            'Room_Id' => 'Room  ID',
            'Cus_Id' => 'Cus  ID',
            'StartDate' => 'Start Date',
            'DateFrom' => 'Date From',
            'DateTo' => 'Date To',
            'NumCus' => 'Num Cus',
            'Deposit' => 'Deposit',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories0()
    {
        return $this->hasMany(History::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories1()
    {
        return $this->hasMany(History::className(), ['Cus_Id' => 'Cus_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistory()
    {
        return $this->hasOne(History::className(), ['DateFrom' => 'DateFrom']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceofrentals()
    {
        return $this->hasMany(Serviceofrental::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceofrentals0()
    {
        return $this->hasMany(Serviceofrental::className(), ['Room_Id' => 'Room_Id']);
    }
}
