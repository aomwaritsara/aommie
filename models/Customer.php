<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property string $Cus_Id
 * @property string $Fname
 * @property string $Lname
 * @property string $Tel
 * @property string $Email
 * @property string $Address
 *
 * @property Booking[] $bookings
 * @property Rental[] $rentals
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cus_Id', 'Fname', 'Lname', 'Tel', 'Email', 'Address'], 'required'],
            [['Address'], 'string'],
            [['Cus_Id'], 'string', 'max' => 13],
            [['Fname', 'Lname'], 'string', 'max' => 20],
            [['Tel'], 'string', 'max' => 10],
            [['Email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Cus_Id' => 'Cus  ID',
            'Fname' => 'Fname',
            'Lname' => 'Lname',
            'Tel' => 'Tel',
            'Email' => 'Email',
            'Address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['Cus_Id' => 'Cus_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['Cus_Id' => 'Cus_Id']);
    }
}
