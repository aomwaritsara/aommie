<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Service_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Price')->textInput() ?>

    <?= $form->field($model, 'Unit')->textInput(['maxlength' => true]) ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
