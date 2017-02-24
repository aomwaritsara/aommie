<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Room;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */

/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->textInput() ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Price')->textInput() ?>

    <?= $form->field($model, 'Eletricity')->textInput() ?>

    <?= $form->field($model, 'Watersupply')->textInput() ?>



    <?= $form->field($model2, 'Apart_Id')->textInput()  ?>

    <?= $form->field($model2, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2,  'Name')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model2, 'Floor')->textInput() ?>

    <?= $form->field($model2, 'Status')->dropDownList(['1'=>'ว่าง','2'=>'ถูกจอง','3'=>'ถูกเช่า','4'=>'ไม่พร้อมใช้งาน'],['prompt'=>'กรุณาเลือกสถานะ']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
