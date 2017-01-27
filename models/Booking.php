<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Cus_Id
 * @property string $Booking_Date
 * @property string $Status
 * @property string $Datestatus
 *
 * @property Room $apart
 * @property Room $room
 * @property Customer $cus
 * @property Deposit[] $deposits
 * @property Deposit[] $deposits0
 * @property Deposit[] $deposits1
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
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'Booking_Date', 'Status', 'Datestatus'], 'required'],
            [['Apart_Id'], 'integer'],
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
            'Apart_Id' => 'Apart  ID',
            'Room_Id' => 'Room  ID',
            'Cus_Id' => 'Cus  ID',
            'Booking_Date' => 'Booking  Date',
            'Status' => 'Status',
            'Datestatus' => 'Datestatus',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeposits()
    {
        return $this->hasMany(Deposit::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeposits0()
    {
        return $this->hasMany(Deposit::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeposits1()
    {
        return $this->hasMany(Deposit::className(), ['Cus_Id' => 'Cus_Id']);
    }
     public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['Cus_Id' => 'Cus_Id']);
    }
}
