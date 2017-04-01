<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

       <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Staff_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true]) ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
