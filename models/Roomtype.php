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
 */
class Roomtype extends \yii\db\ActiveRecord
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
            'Apart_Id' => 'รหัสอพาร์ตเมนต์',
            'Room_Id' => 'รหัสห้องพัก',
            'Type' => 'ประเภทห้องพัก',
            'Price' => 'ราคาห้องพัก',
            'Eletricity' => 'ราคาค่าไฟ',
            'Watersupply' => 'ราคาค่าน้ำ',
        ];
    }
}
