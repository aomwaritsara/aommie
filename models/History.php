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
 * @property string $CurrentDate
 * @property integer $Elec_Used
 * @property integer $Water_Used
 * @property integer $Cost
 * @property string $Unit
 * @property integer $TotalAmount
 * @property string $PaymentStatus
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
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'DateFrom', 'CurrentDate', 'Elec_Used', 'Water_Used', 'Cost', 'Unit', 'TotalAmount', 'PaymentStatus'], 'required'],
            [['Apart_Id', 'Elec_Used', 'Water_Used', 'Cost', 'TotalAmount'], 'integer'],
            [['DateFrom', 'CurrentDate'], 'safe'],
            [['Room_Id', 'Unit'], 'string', 'max' => 10],
            [['Cus_Id'], 'string', 'max' => 13],
            [['PaymentStatus'], 'string', 'max' => 1],
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
            'CurrentDate' => 'Current Date',
            'Elec_Used' => 'Elec  Used',
            'Water_Used' => 'Water  Used',
            'Cost' => 'Cost',
            'Unit' => 'Unit',
            'TotalAmount' => 'Total Amount',
            'PaymentStatus' => 'Payment Status',
        ];
    }
}
