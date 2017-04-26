<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form" align="center" >

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Staff_Id')->hiddenInput(['maxlength' => true, 'readonly' => true])->label(false) ?>

   
    <?= $form->field($model, 'Status')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    <!-- <?//= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?> -->
 <?= $form->field($model, 'Username')->textInput(['maxlength' => true, ]) ?>
 
    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>



    <button type="submit" class="btn btn-primary">บันทึก</button>

    <?php ActiveForm::end(); ?>

</div>
