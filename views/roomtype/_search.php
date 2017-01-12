<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoomtypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roomtype-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Apart_Id') ?>

    <?= $form->field($model, 'Room_Id') ?>

    <?= $form->field($model, 'Type') ?>

    <?= $form->field($model, 'Price') ?>

    <?= $form->field($model, 'Eletricity') ?>

    <?php // echo $form->field($model, 'Watersupply') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
