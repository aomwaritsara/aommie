<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $Apart_Id รหัสอพาร์ตเมนต์
 * @property string $Room_Id รหัสห้องพัก
 * @property string $Cus_Id รหัสประจำตัวประชาชน
 * @property string $DateFrom วันที่เริ่มเช่า
 * @property string $SoR_Id รหัสบริการเสริม
 * @property string $CheckDate วันที่ปัจจุบัน
 * @property int $Elec_Used จำนวนหน่วยไฟฟ้าที่ใช้
 * @property int $Water_Used จำนวนผู้เข้าพัก
 * @property int $Cost ราคาของบริการเสริม
 * @property int $TotalPrice ค่าใช้จ่ายทั้งหมด
 * @property string $PaymentStatus สถานะการชำระเงิน
 *
 * @property Rental $apart
 * @property Rental $room
 * @property Rental $cus
 * @property Rental $dateFrom
 * @property Serviceofrental $soR
 */
class History extends \yii\db\ActiveRecord
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
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'DateFrom', 'CheckDate', 'Elec_Used', 'Water_Used', 'Cost', 'TotalPrice', 'PaymentStatus'], 'required'],
            [['Apart_Id', 'Elec_Used', 'Water_Used', 'Cost', 'TotalPrice'], 'integer'],
            [['DateFrom', 'CheckDate'], 'safe'],
            [['Room_Id', 'SoR_Id'], 'string', 'max' => 10],
            [['Cus_Id'], 'string', 'max' => 13],
            [['PaymentStatus'], 'string', 'max' => 1],
            [['DateFrom'], 'unique'],
            [['CheckDate'], 'unique'],
            [['SoR_Id'], 'unique'],
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
            'Apart_Id' => 'รหัสอพาร์ตเมนต์',
            'Room_Id' => 'รหัสห้องพัก',
            'Cus_Id' => 'รหัสประจำตัวประชาชน',
            'DateFrom' => 'วันที่เก็บค่าเช่าเช่า',
            'SoR_Id' => 'รหัสบริการเสริมของห้องพัก',
            'CheckDate' => 'วันที่ปัจจุบัน',
            'Elec_Used' => 'ค่าไฟฟ้า',
            'Water_Used' => 'ค่าน้ำ',
            'Cost' => 'ราคา',
            'TotalPrice' => 'ราคารวม',
            'PaymentStatus' => 'สถานะการชำระเงิน',
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
