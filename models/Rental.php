<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rental".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Cus_Id
 * @property string $DateFrom
 * @property string $DateTo
 * @property integer $NumCus
 * @property integer $Deposit
 * @property string $Status
 */
class Rental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'DateFrom', 'NumCus', 'Deposit', 'Status'], 'required'],
            [['Apart_Id', 'NumCus', 'Deposit'], 'integer'],
            [['DateFrom', 'DateTo'], 'safe'],
            [['Room_Id'], 'string', 'max' => 10],
            [['Cus_Id'], 'string', 'max' => 13],
            [['Status'], 'string', 'max' => 1],
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
            'Cus_Id' => 'รหัสประจำตัวประชาชน',
            'DateFrom' => 'วันที่เช่า',
            'DateTo' => 'กำหนดออก',
            'NumCus' => 'จำนวนผู้เข้าพัก',
            'Deposit' => 'เงินประกันห้องพัก',
            'Status' => 'สถานะการเช่า',
        ];
    }
}
