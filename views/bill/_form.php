<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cus_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateFrom')->textInput() ?>

    <?= $form->field($model, 'SoR_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CurrentDate')->textInput() ?>

    <?= $form->field($model, 'Elec_Used')->textInput() ?>

    <?= $form->field($model, 'Water_Used')->textInput() ?>

    <?= $form->field($model, 'Cost')->textInput() ?>

    <?= $form->field($model, 'TotalPrice')->textInput() ?>

    <?= $form->field($model, 'PaymentStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
