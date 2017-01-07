<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "serviceofrental".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Service_Id
 * @property integer $SoR_Id
 * @property integer $Amount
 * @property integer $Cost
 * @property double $TotalCost
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
            [['Apart_Id', 'Room_Id', 'Service_Id', 'SoR_Id', 'Amount', 'Cost', 'TotalCost'], 'required'],
            [['Apart_Id', 'SoR_Id', 'Amount', 'Cost'], 'integer'],
            [['TotalCost'], 'number'],
            [['Room_Id', 'Service_Id'], 'string', 'max' => 10],
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
            'Service_Id' => 'Service  ID',
            'SoR_Id' => 'So R  ID',
            'Amount' => 'Amount',
            'Cost' => 'Cost',
            'TotalCost' => 'Total Cost',
        ];
    }
}
