<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Staff_Id')->hiddenInput(['maxlength' => true, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    <?= $form->field($model, 'Status')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    <!-- <?//= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>



    <button type="submit" class="btn btn-primary">Submit</button>

    <?php ActiveForm::end(); ?>

</div>
