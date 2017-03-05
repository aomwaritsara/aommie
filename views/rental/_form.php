<?php
use app\models\Room;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rental-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apart_Id')->dropDownList(ArrayHelper::map(Room::find()->distinct('Apart_Id')->where("Status='3'")->all(),'Apart_Id','Apart_Id')) ?>

    <?= $form->field($model, 'Room_Id')->dropDownList(ArrayHelper::map(Room::find()->where("Status='3'")->all(),'Room_Id','Room_Id'),['prompt'=>'เลือกห้อง']) ?>

    <?= $form->field($model, 'Cus_Id')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9999999999999', ]) ?>


    <?= $form->field($model, 'DateFrom')->widget(DateTimePicker::classname(), [
    'language' => 'th',
        'readonly'=> true,
      'pluginOptions' => [
        'format' => 'yyyy-mm-dd hh:ii:ss'
    ]
]) ?> 

    <?= $form->field($model, 'DateTo')->widget(DateTimePicker::classname(), [
    'language' => 'th',
        'readonly'=> true,
      'pluginOptions' => [
        'format' => 'yyyy-mm-dd hh:ii:ss'
    ]
]) ?> 

    <?= $form->field($model, 'NumCus')->textInput() ?>

    <?= $form->field($model, 'Deposit')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([1=>'ยกเลิก',2=>'ใช้งาน'],['prompt'=>'เลือกสถานะ'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
