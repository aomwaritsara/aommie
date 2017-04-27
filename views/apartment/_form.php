<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\Session;
use yii\widgets\MaskedInput;


foreach ($Apa as $key => $value) :
    $value->Apart_Id;
endforeach;


if($model->Apart_Id == null){ //if insert
    if(!isset($value->Apart_Id)){
        $model->Apart_Id = '1';
    }
    else
    {
        //echo $value->p_id."<br>";
        $string = $value->Apart_Id ;
        //echo $string;
        // return S 
       $S = substr($string, -5, -4);
        //echo $S."<br>";

        // return id xxxx
       $number = substr($string, -4); // 0002
        $new_number = intval($number); // 2
        $new_number = $new_number + 1; // 2+1 = 3

        if($new_number <= 9999){
            if($new_number < 10){
                $mynumber = '000'.$new_number; //0xxx
            }else if($new_number < 100){
                $mynumber = '00'.$new_number; //00xx
            }else if($new_number < 1000){
                $mynumber = '0'.$new_number; //0xxx
            }else{
                $mynumber = $new_number; //xxxx
            }
        }

        $new_id = $mynumber;
        $model->Apart_Id = $new_id;
    }
    
}


/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartment-form">

      <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Apart_Id')->textInput(['readonly'=>true]) ?>
    <?= $form->field($model, 'Staff_Id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->widget(MaskedInput::className(),[
                'clientOptions' => [
                    'alias' =>  'email'
                ],
            ])?>

    <?= $form->field($model, 'NumRoom')->textInput() ?>

    <?= $form->field($model, 'NumFloor')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ->dropDownList([1=>'ใช้งาน',0=>'ระงับการใช้งาน'])  ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
