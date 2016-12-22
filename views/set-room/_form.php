<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Floor')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
