<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Apart_Id') ?>

    <?= $form->field($model, 'Room_Id') ?>

    <?= $form->field($model, 'Cus_Id') ?>

    <?= $form->field($model, 'DateFrom') ?>

    <?= $form->field($model, 'Sor_Id') ?>

    <?php // echo $form->field($model, 'CurrentDate') ?>

    <?php // echo $form->field($model, 'Elec_Used') ?>

    <?php // echo $form->field($model, 'Water_Used') ?>

    <?php // echo $form->field($model, 'Cost') ?>

    <?php // echo $form->field($model, 'Unit') ?>

    <?php // echo $form->field($model, 'TotalAmount') ?>

    <?php // echo $form->field($model, 'PaymentStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
