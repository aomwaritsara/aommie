<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\Customer;
use app\models\CustomerSearch;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cus_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Booking_Date')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Datestatus')->textInput() ?>


    <?= $form->field($model2, 'Cus_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'Fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'Lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'Tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'Address')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
