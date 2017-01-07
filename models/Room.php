<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $Apart_Id
 * @property string $Room_Id
 * @property string $Name
 * @property integer $Floor
 * @property string $Status
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Room_Id', 'Name', 'Floor', 'Status'], 'required'],
            [['Apart_Id', 'Floor'], 'integer'],
            [['Room_Id'], 'string', 'max' => 10],
            [['Name'], 'string', 'max' => 30],
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
            'Name' => 'Name',
            'Floor' => 'Floor',
            'Status' => 'Status',
        ];
    }
}
