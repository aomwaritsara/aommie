<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "financial_apartment".
 *
 * @property string $Finan_Id รหัสบัญชีอพาร์ตเมนต์
 * @property int $Apart_Id รหัสอพาร์ตเมนต์
 * @property string $Date วันที่
 * @property string $Destination กิจการที่ทำการชำระเงิน
 * @property string $Name รายการชำระเงิน
 * @property int $Amount จำนวน
 * @property int $Price ราคา
 * @property double $TotalPrice ราคารวม
 *
 * @property Apartment $apart
 */
class ReFinancial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'financial_apartment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Finan_Id', 'Apart_Id', 'Date', 'Destination', 'Name', 'Amount', 'Price', 'TotalPrice'], 'required'],
            [['Apart_Id', 'Amount', 'Price'], 'integer'],
            [['Date'], 'safe'],
            [['TotalPrice'], 'number'],
            [['Finan_Id'], 'string', 'max' => 5],
            [['Destination', 'Name'], 'string', 'max' => 50],
            [['Apart_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['Apart_Id' => 'Apart_Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Finan_Id' => 'Finan  ID',
            'Apart_Id' => 'Apart  ID',
            'Date' => 'Date',
            'Destination' => 'Destination',
            'Name' => 'Name',
            'Amount' => 'Amount',
            'Price' => 'Price',
            'TotalPrice' => 'Total Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApart()
    {
        return $this->hasOne(Apartment::className(), ['Apart_Id' => 'Apart_Id']);
    }
}
