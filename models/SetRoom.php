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
 * @property Roomtype[] $roomtypes
 * @property Roomtype[] $roomtypes0
 * @property SetRoom[] $rooms
 * @property SetRoom[] $aparts
 */
class SetRoom extends \yii\db\ActiveRecord
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
            'Name' => 'Name',
            'Floor' => 'Floor',
            'Status' => 'Status',
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
    public function getRoomtypes()
    {
        return $this->hasMany(Roomtype::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomtypes0()
    {
        return $this->hasMany(Roomtype::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(SetRoom::className(), ['Room_Id' => 'Room_Id'])->viaTable('roomtype', ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAparts()
    {
        return $this->hasMany(SetRoom::className(), ['Apart_Id' => 'Apart_Id'])->viaTable('roomtype', ['Room_Id' => 'Room_Id']);
    }
}
