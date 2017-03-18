<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deposit".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Cus_Id
 * @property integer $Price
 * @property string $Status
 *
 * @property Booking $apart
 * @property Booking $room
 * @property Booking $cus
 */
class Deposit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deposit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'Price', 'Status'], 'required'],
            [['Apart_Id', 'Price'], 'integer'],
            [['Room_Id'], 'string', 'max' => 10],
            [['Cus_Id'], 'string', 'max' => 13],
            [['Status'], 'string', 'max' => 1],
            [['Apart_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['Apart_Id' => 'Apart_Id']],
            [['Room_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['Room_Id' => 'Room_Id']],
            [['Cus_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['Cus_Id' => 'Cus_Id']],
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
            'Price' => 'Price',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApart()
    {
        return $this->hasOne(Booking::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Booking::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCus()
    {
        return $this->hasOne(Booking::className(), ['Cus_Id' => 'Cus_Id']);
    }
}
