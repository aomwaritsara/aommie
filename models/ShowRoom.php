<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roomtype".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Type
 * @property integer $Price
 * @property integer $Eletricity
 * @property integer $Watersupply
 *
 * @property Room[] $rooms
 * @property Apartment[] $aparts
 */
class ShowRoom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roomtype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Type', 'Price', 'Eletricity', 'Watersupply'], 'required'],
            [['Apart_Id', 'Price', 'Eletricity', 'Watersupply'], 'integer'],
            [['Room_Id'], 'string', 'max' => 10],
            [['Type'], 'string', 'max' => 20],
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
            'Type' => 'Type',
            'Price' => 'Price',
            'Eletricity' => 'Eletricity',
            'Watersupply' => 'Watersupply',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['Room_Id' => 'Room_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAparts()
    {
        return $this->hasMany(Apartment::className(), ['Apart_Id' => 'Apart_Id'])->viaTable('room', ['Room_Id' => 'Room_Id']);
    }

     public function getRoom()
    {
        return $this->hasOne(Room::className(), ['Room_Id' => 'Room_Id']);
    }
    
    

}
