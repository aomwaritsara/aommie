<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
foreach ($Service as $key => $value) :
	$value->Service_Id;
endforeach;


if($model->Service_Id == null){ //if insert
	if(!isset($value->Service_Id)){
		$model->Service_Id = 'S0001';
	}
	else
	{
		//echo $value->p_id."<br>";
		$string = $value->Service_Id ;
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

		$new_id = $S.$mynumber;
		$model->Service_Id = $new_id;
	}
	
}
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Service_Id')->textInput(['maxlength' => true,'readonly'=> true]) ?>

    <?= $form->field($model, 'Name')->textinput(['readonly'=> true]) ?>

    <?= $form->field($model, 'Price')->textInput() ?>

    <?= $form->field($model, 'Unit')->textInput(['maxlength' => true,'readonly'=> true]) ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
