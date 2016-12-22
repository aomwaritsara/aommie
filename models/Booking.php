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
 */
class Booking extends \yii\db\ActiveRecord
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
            'Price' => 'จำนวนเงินมัดจำ',
            'Status' => 'สถานะการจ่ายเงินมัดจำ',
        ];
    }
}
