<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReFinancialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="re-financial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Finan_Id') ?>

    <?= $form->field($model, 'Apart_Id') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'Destination') ?>

    <?= $form->field($model, 'Name') ?>

    <?php // echo $form->field($model, 'Amount') ?>

    <?php // echo $form->field($model, 'Price') ?>

    <?php // echo $form->field($model, 'TotalPrice') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
