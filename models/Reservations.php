<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Name
 * @property integer $Floor
 * @property string $Status
 *
 * @property Booking[] $bookings
 * @property Booking[] $bookings0
 * @property Rental[] $rentals
 * @property Rental[] $rentals0
 * @property Apartment $apart
 * @property Roomtype $room
 */
class Reservations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Name', 'Floor', 'Status'], 'required'],
            [['Apart_Id', 'Floor'], 'integer'],
            [['Room_Id'], 'string', 'max' => 10],
            [['Name'], 'string', 'max' => 30],
            [['Status'], 'string', 'max' => 1],
            [['Apart_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['Apart_Id' => 'Apart_Id']],
            [['Room_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Roomtype::className(), 'targetAttribute' => ['Room_Id' => 'Room_Id']],
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
            'Name' => 'ชื่อห้องพัก',
            'Floor' => 'ชั้น',
            'Status' => 'สถานะ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings0()
    {
        return $this->hasMany(Booking::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals0()
    {
        return $this->hasMany(Rental::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApart()
    {
        return $this->hasOne(Apartment::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Roomtype::className(), ['Room_Id' => 'Room_Id']);
    }
}
