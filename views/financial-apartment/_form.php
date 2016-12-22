<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="financial-apartment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Finan_Id')->textInput() ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'Destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'Price')->textInput() ?>

    <?= $form->field($model, 'TotalPrice')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
