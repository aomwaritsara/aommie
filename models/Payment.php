<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Cus_Id
 * @property string $DateFrom
 * @property string $SoR_Id
 * @property string $CurrentDate
 * @property integer $Elec_Used
 * @property integer $Water_Used
 * @property integer $Cost
 * @property string $Unit
 * @property integer $TotalAmount
 * @property string $PaymentStatus
 *
 * @property Rental $apart
 * @property Rental $room
 * @property Rental $cus
 * @property Rental $dateFrom
 * @property Serviceofrental $soR
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'DateFrom', 'SoR_Id', 'CurrentDate', 'Elec_Used', 'Water_Used', 'Cost', 'Unit', 'TotalAmount', 'PaymentStatus'], 'required'],
            [['Apart_Id', 'Elec_Used', 'Water_Used', 'Cost', 'TotalAmount'], 'integer'],
            [['DateFrom', 'CurrentDate'], 'safe'],
            [['Room_Id', 'SoR_Id', 'Unit'], 'string', 'max' => 10],
            [['Cus_Id'], 'string', 'max' => 13],
            [['PaymentStatus'], 'string', 'max' => 1],
            [['SoR_Id'], 'unique'],
            [['DateFrom'], 'unique'],
            [['SoR_Id'], 'unique'],
            [['Apart_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Rental::className(), 'targetAttribute' => ['Apart_Id' => 'Apart_Id']],
            [['Room_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Rental::className(), 'targetAttribute' => ['Room_Id' => 'Room_Id']],
            [['Cus_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Rental::className(), 'targetAttribute' => ['Cus_Id' => 'Cus_Id']],
            [['DateFrom'], 'exist', 'skipOnError' => true, 'targetClass' => Rental::className(), 'targetAttribute' => ['DateFrom' => 'DateFrom']],
            [['SoR_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Serviceofrental::className(), 'targetAttribute' => ['SoR_Id' => 'SoR_Id']],
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
            'DateFrom' => 'Date From',
            'SoR_Id' => 'So R  ID',
            'CurrentDate' => 'Current Date',
            'Elec_Used' => 'Elec  Used',
            'Water_Used' => 'Water  Used',
            'Cost' => 'Cost',
            'Unit' => 'Unit',
            'TotalAmount' => 'Total Amount',
            'PaymentStatus' => 'Payment Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApart()
    {
        return $this->hasOne(Rental::className(), ['Apart_Id' => 'Apart_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Rental::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCus()
    {
        return $this->hasOne(Rental::className(), ['Cus_Id' => 'Cus_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDateFrom()
    {
        return $this->hasOne(Rental::className(), ['DateFrom' => 'DateFrom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoR()
    {
        return $this->hasOne(Serviceofrental::className(), ['SoR_Id' => 'SoR_Id']);
    }
}
