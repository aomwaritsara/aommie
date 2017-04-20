<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\models\Customer;
use app\models\CustomerSearch;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use app\models\Room;
use yii\web\Session;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="_form-member-form">
  <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

   <?php
    $session = new Session;
        $session->open(); 

        ?>
    <?= $form->field($apartment, 'Apart_Id')->textinput(['readonly'=> true])?>

    <?php //0 = insert 1=update?>

   <?php if ($isUpdated == 0): ?>
     <?= $form->field($model, 'Room_Id')->dropDownList(ArrayHelper::map(Room::find()->where("Status='1'")->all(),'Room_Id','Room_Id'),['prompt'=>'เลือกห้อง'])?>
   <?php   endif;   ?>

   <?php if ($isUpdated == 1): ?> 
   <?=  $form->field($model, 'Room_Id')->textinput(['readonly'=> true,'value'=>$model->Room_Id]) ?>
   <?php   endif;   ?>

    <?php if ($isUpdated == 1): ?> 
   <?=  $form->field($model, 'Cus_Id')->textinput(['readonly'=> true,'value'=>$model->Cus_Id]) ?>
   <?php   endif;   ?>


    <?php if ($isUpdated == 0): ?> 
    <?= $form->field($model, 'Cus_Id')->widget(MaskedInput::className(),[
                'mask'=>'9999999999999'
            ])?>
  
    <?php   endif;   ?>

    <?= $form->field($model, 'Deposit')->textinput(['type' => 'number','min'=>"0"]) ?>
    

     <?php if ($isUpdated == 0): ?>
    <?= $form->field($model, 'Booking_Date')->textinput([ 
      'readonly'=> true,
      'pluginOptions' => [
      'language' => 'th',
     'format' => 'yyyy-mm-dd hh:ii:ss',
      $model->Booking_Date = date('Y-m-d H:i:s')
    ]
]) ?> 
<?php   endif;   ?>

  <?php if ($isUpdated == 1): ?> 
   <?=  $form->field($model, 'Booking_Date')->textinput(['readonly'=> true,'value'=>$model->Booking_Date]) ?>
   <?php   endif;   ?>

    
     

<!--     <?= $form->field($model, 'Datestatus')->textinput([ 
      'readonly'=> true,
      'pluginOptions' => [
      'language' => 'th',
     'format' => 'yyyy-mm-dd hh:ii:ss',
      $model->Datestatus = date('Y-m-d H:i:s')
    ]
])  ?>  -->


 
    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
