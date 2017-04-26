<?php
use app\models\Room;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model app\models\Rental */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="rental-form">

  <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Apart_Id')->textinput(['readonly'=>true,'value'=>'1']) ?>

<?php if ($isUpdated == 0): ?>
   <?= $form->field($model, 'Room_Id')->dropDownList(ArrayHelper::map(Room::find()->where("Status='1'")->orWhere("Status='3'")->all(),'Room_Id','Room_Id'),['prompt'=>'เลือกห้อง']) ?>
<?php   endif;   ?>

<?php if ($isUpdated == 1): ?>
   <?= $form->field($model, 'Room_Id')->textinput(['readonly'=>true,'value'=>$model->Room_Id]) ?>
<?php   endif;   ?>

   <?php if ($isUpdated == 0): ?>
   <?= $form->field($model, 'Cus_Id')->widget(MaskedInput::className(),[
                'mask'=>'9999999999999'
            ])?>
  
    <?php   endif;   ?>

<?php if ($isUpdated == 1): ?>
    <?= $form->field($model, 'Cus_Id')->textinput(['readonly'=>true,'value'=>$model->Cus_Id])?>
    <?php   endif;   ?>

<?php $model->StartDate = date('Y-m-d H:i:s'); ?>
<?= $form->field($model, 'StartDate')->textinput(['readonly'=> true,])
     
  ?> 



    <?php 
      $date = strtotime($model->StartDate);
      $date = strtotime("+30 day", $date);
      $date = date('Y-m-d H:i:s', $date);
      $model->DateTo = $date;
    ?>
    <?= $form->field($model, 'DateTo')->textinput(['readonly'=> true,])
 ?> 



    <?= $form->field($model, 'NumCus')->textInput(['type' => 'number','min'=>"1"]) ?>

   <!--  <?if($model3 = Booking::find()->where(['Apart_Id' => $model->Apart_Id,'Room_Id' => $model->Room_Id,'Cus_Id' => $model->Cus_Id])->one()){
             $model->Deposit=$model3->Deposit; ?>
 -->
    <?= $form->field($model, 'Deposit')->textInput(['type' => 'number','min'=>"0"]) ?>

    <?= $form->field($model, 'Status')->dropDownList([2=>'ใช้งาน'])  ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
