<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\Customer;
use app\models\CustomerSearch;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use app\models\Room;
//use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->dropDownList(ArrayHelper::map(Room::find()->distinct('Apart_Id')->where("Status='1'")->all(),'Apart_Id','Apart_Id')) ?>

    <?= $form->field($model, 'Room_Id')->dropDownList(ArrayHelper::map(Room::find()->where("Status='1'")->all(),'Room_Id','Room_Id'),['prompt'=>'เลือกห้อง']) ?>

    <?= $form->field($model, 'Cus_Id')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9999999999999', ]) ?>

    <?= $form->field($model, 'Deposit')->textinput() ?>
    
    <?= $form->field($model, 'Booking_Date')->widget(DateTimePicker::classname(), [
    'language' => 'th',
        'readonly'=> true,
      'pluginOptions' => [
        'format' => 'yyyy-mm-dd hh:ii:ss'
    ]
]) ?> 

    <?= $form->field($model, 'Status')->dropDownList([3=>'ใช้งาน'],['prompt'=>''])  ?>
     

    <?= $form->field($model, 'Datestatus')->widget(DateTimePicker::classname(), [
    'language' => 'th',
         'readonly'=> true,
      'pluginOptions' => [
        'format' => 'yyyy-mm-dd hh:ii:ss'
    ]
]) ?>


 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
