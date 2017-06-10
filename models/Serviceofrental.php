<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "serviceofrental".
 *
 * @property string $SoR_Id
 * @property int $Apart_Id
 * @property string $Room_Id
 * @property string $Service_Id
 * @property string $Cus_Id
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
            [['SoR_Id', 'Apart_Id', 'Room_Id', 'Service_Id', 'Cus_Id'], 'required'],
            [['Apart_Id'], 'integer'],
            [['SoR_Id', 'Room_Id'], 'string', 'max' => 10],
            [['Service_Id'], 'string', 'max' => 5],
            [['Cus_Id'], 'string', 'max' => 13],
            [['SoR_Id'], 'unique'],
            [['Cus_Id'], 'unique'],
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
            'SoR_Id' => 'So R  ID',
            'Apart_Id' => 'Apart  ID',
            'Room_Id' => 'Room  ID',
            'Service_Id' => 'Service  ID',
            'Cus_Id' => 'Cus  ID',
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
