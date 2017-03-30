<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

   <?= $form->field($model, 'Cus_Id')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9999999999999', ]) ?>

    <?= $form->field($model, 'Fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tel')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9999999999', ]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
