<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Restore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restore-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cus_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateFrom')->textInput() ?>

    <?= $form->field($model, 'DateTo')->textInput() ?>

    <?= $form->field($model, 'NumCus')->textInput() ?>

    <?= $form->field($model, 'Deposit')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
