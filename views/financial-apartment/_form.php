<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

foreach ($Finan as $key => $value) :
    $value->Finan_Id;
endforeach;


if($model->Finan_Id == null){ //if insert
    if(!isset($value->Finan_Id)){
        $model->Finan_Id = 'F0001';
    }
    else
    {
        //echo $value->p_id."<br>";
        $string = $value->Finan_Id ;
       // echo $string;
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

        $new_id = $S.$mynumber;
        $model->Finan_Id = $new_id;
    }
    
}
?>

<div class="financial-apartment-form">
  <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Finan_Id')->textInput(['readonly'=> true]) ?>

    <?= $form->field($apartment, 'Apart_Id')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'Date')->textinput([ 
      'readonly'=> true,
      'pluginOptions' => [
      'language' => 'th',
     'format' => 'yyyy-mm-dd hh:ii:ss',
      $model->Date = date('Y-m-d h:i:s')
    ]
])?>

    <?= $form->field($model, 'Destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'Price')->textInput() ?>

    
 <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
