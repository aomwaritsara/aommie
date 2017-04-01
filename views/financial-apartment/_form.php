<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="financial-apartment-form">
  <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Finan_Id')->textInput() ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'Destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'Price')->textInput() ?>

    <?= $form->field($model, 'TotalPrice')->textInput() ?>
    
 <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
