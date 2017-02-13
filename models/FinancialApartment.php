<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "financial_apartment".
 *
 * @property integer $Finan_Id
 * @property integer $Apart_Id
 * @property string $Date
 * @property string $Destination
 * @property string $Name
 * @property integer $Amount
 * @property integer $Price
 * @property double $TotalPrice
 */
class FinancialApartment extends \yii\db\ActiveRecord
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
            [['Finan_Id', 'Apart_Id', 'Amount', 'Price'], 'integer'],
            [['Date'], 'safe'],
            [['TotalPrice'], 'number'],
            [['Destination', 'Name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Finan_Id' => 'รหัสบัญชีอพาร์ตเมนต์',
            'Apart_Id' => 'รหัสอพาร์ตเมนต์',
            'Date' => 'วันที่'   ,
             'Destination' => 'กิจการที่ชำระเงินให้',
            'Name' => 'รายการ',
            'Amount' => 'จำนวน',
            'Price' => 'ราคา',
            'TotalPrice' => 'ราคารวม',
        ];
    }
}
