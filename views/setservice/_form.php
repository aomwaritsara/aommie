<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setservice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setservice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Price')->textInput() ?>

    <?= $form->field($model, 'Eletricity')->textInput() ?>

    <?= $form->field($model, 'Watersupply')->textInput() ?>



    <?= $form->field($model2, 'Service_Id')->textInput() ?>

    <?= $form->field($model2, 'Name')->textInput() ?>

    <?= $form->field($model2, 'Price')->textInput() ?>
  
    <?= $form->field($model2, 'Unit')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
