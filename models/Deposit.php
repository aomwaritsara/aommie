<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deposit".
 *
 * @property int $Apart_Id
 * @property string $Room_Id
 * @property string $Cus_Id
 * @property string $Date
 * @property int $Price
 * @property string $Status
 */
class Deposit extends \yii\db\ActiveRecord
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
            [['Apart_Id', 'Room_Id', 'Cus_Id', 'Date', 'Price', 'Status'], 'required'],
            [['Apart_Id', 'Price'], 'integer'],
            [['Date'], 'safe'],
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
            'Apart_Id' => 'Apart  ID',
            'Room_Id' => 'Room  ID',
            'Cus_Id' => 'Cus  ID',
            'Date' => 'Date',
            'Price' => 'Price',
            'Status' => 'Status',
        ];
    }
}
