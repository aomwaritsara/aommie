<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Room;
use app\models\RoomSearch;
use yii\helpers\ArrayHelper;
use app\models\Apartment;
use app\models\ApartmentSearch;
/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */

/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */ 


//=== ดัก ห้องห้ามเกิน Apart->Numroom 
//=== ดัก ชั้นห้ามเกินApart->NumFloor
?>
<?php 
    
    $listApartment = ArrayHelper::map($FloorNumber, 'Floor', 'Floor'); 
?> 
   
<div class="set-room-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Apart_Id')->textInput(['readonly'=> true,'value'=>'1']) ?>

    <?= $form->field($model, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->dropDownList(['A'=>'ทั่วไป','B'=>'ร้านค้า'],['prompt'=>'เลือกประเภท'])  ?> 
    
  <?= $form->field($model2,  'Name')->textInput(['maxlength' => true]) ?> 


    <?= $form->field($model2, 'Floor')->dropDownList($listApartment) ?> 
    
   
    <?= $form->field($model, 'Price')->textInput() ?>

    <?= $form->field($model, 'Eletricity')->textInput() ?>

    <?= $form->field($model, 'Watersupply')->textInput() ?>


    <?= $form->field($model2, 'Status')->dropDownList([1=>'ว่าง',2=>'ถูกจอง',3=>'ถูกเช่า',4=>'ไม่พร้อมใช้งาน'],['prompt'=>'กรุณาเลือกสถานะ']) ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
