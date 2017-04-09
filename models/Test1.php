<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property string $id
 * @property int $amout
 */
class Test1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'amout'], 'required'],
            [['amout'], 'integer'],
            //[['id'], 'validateIdCard'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amout' => 'Amout',
        ];
    }
    public function validateIdCard()
    {
        $id = str_split(str_replace('-','', $this->id)); //ตัดรูปแบบและเอา ตัวอักษร ไปแยกเป็น array $id
        $sum = 0;
        $total = 0;
        $digi = 13;
        
        for($i=0; $i<12; $i++){
            $sum = $sum + (intval($id[$i]) * $digi);
            $digi--;
        }
        $total = (11 - ($sum % 11)) % 10;
        
        if($total != $id[12]){ //ตัวที่ 13 มีค่าไม่เท่ากับผลรวมจากการคำนวณ ให้ add error
            $this->addError('id', 'หมายเลขบัตรประชาชนไม่ถูกต้อง');
        }
        
        
    }
}



