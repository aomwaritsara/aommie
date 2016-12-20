<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property string $Service_Id
 * @property string $Name
 * @property integer $Price
 * @property string $Option
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Service_Id', 'Name', 'Price', 'Option'], 'required'],
            [['Name'], 'string'],
            [['Price'], 'integer'],
            [['Service_Id'], 'string', 'max' => 5],
            [['Option'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Service_Id' => 'Service  ID',
            'Name' => 'Name',
            'Price' => 'Price',
            'Option' => 'Option',
        ];
    }
}
