<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReRestoreStoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restore-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Apart_Id') ?>

    <?= $form->field($model, 'Room_Id') ?>

    <?= $form->field($model, 'Cus_Id') ?>

    <?= $form->field($model, 'DateFrom') ?>

    <?= $form->field($model, 'DateTo') ?>

    <?php // echo $form->field($model, 'NumCus') ?>

    <?php // echo $form->field($model, 'Deposit') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
