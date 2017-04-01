<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Room;
use app\models\RoomSearch;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */

/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-room-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Apart_Id')->textInput(['readonly'=> true,'value'=>'1']) ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->dropDownList(['A'=>'ทั่วไป','B'=>'ร้านค้า'],['prompt'=>'เลือกประเภท'])  ?> 
    
  <?= $form->field($model2,  'Name')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model2, 'Floor')->textInput(['readonly'=> true,'value'=>'3']) ?>
    <?= $form->field($model, 'Price')->textInput(['readonly'=> true,'value'=>'2700']) ?>

    <?= $form->field($model, 'Eletricity')->textInput(['readonly'=> true,'value'=>'7']) ?>

    <?= $form->field($model, 'Watersupply')->textInput(['readonly'=> true,'value'=>'100']) ?>



  

    <?= $form->field($model2, 'Status')->dropDownList(['1'=>'ว่าง','2'=>'ถูกจอง','3'=>'ถูกเช่า','4'=>'ไม่พร้อมใช้งาน'],['prompt'=>'กรุณาเลือกสถานะ']) ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
