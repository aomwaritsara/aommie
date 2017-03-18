<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "serviceofrental".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Service_Id
 * @property string $SoR_Id
 * @property integer $Amount
 * @property string $Cost
 * @property integer $TotalCost
 *
 * @property History $history
 * @property Service $service
 * @property Rental $apart
 * @property Rental $room
 */
class Serviceofrental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'serviceofrental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Service_Id', 'SoR_Id', 'Amount', 'Cost', 'TotalCost'], 'required'],
            [['Apart_Id', 'Amount', 'TotalCost'], 'integer'],
            [['Room_Id', 'SoR_Id', 'Cost'], 'string', 'max' => 10],
            [['Service_Id'], 'string', 'max' => 5],
            [['SoR_Id'], 'unique'],
            [['Service_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['Service_Id' => 'Service_Id']],
            [['Apart_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Rental::className(), 'targetAttribute' => ['Apart_Id' => 'Apart_Id']],
            [['Room_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Rental::className(), 'targetAttribute' => ['Room_Id' => 'Room_Id']],
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
            'Service_Id' => 'Service  ID',
            'SoR_Id' => 'So R  ID',
            'Amount' => 'Amount',
            'Cost' => 'Cost',
            'TotalCost' => 'Total Cost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistory()
    {
        return $this->hasOne(History::className(), ['SoR_Id' => 'SoR_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['Service_Id' => 'Service_Id']);
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
}
