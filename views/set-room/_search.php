<?php

use app\models\Room;
use app\models\RoomSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SetRoomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-room-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',

        
    ]); ?>

    <?= $form->field($model, 'Apart_Id') ?>

    <?= $form->field($model, 'Room_Id') ?>

    <?= $form->field($model, 'Type') ?>

    <?= $form->field($model, 'Price') ?>

    <?= $form->field($model, 'Eletricity') ?>


     <?= $form->field($model2, 'Apart_Id') ?>

    <?= $form->field($model2, 'Room_Id') ?>

    <?= $form->field($model2,  'Name') ?> 

    <?= $form->field($model2, 'Floor')?>

    <?= $form->field($model2, 'Status') ?>

    <?php // echo $form->field($model, 'Watersupply') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
