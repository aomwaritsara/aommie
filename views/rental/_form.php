<?php
use app\models\Room;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;

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
   <?= $form->field($model, 'Cus_Id')->textinput(['maxlength' => true])?>
    <?php   endif;   ?>

<?php if ($isUpdated == 1): ?>
    <?= $form->field($model, 'Cus_Id')->textinput(['readonly'=>true,'value'=>$model->Cus_Id])?>
    <?php   endif;   ?>


    <?= $form->field($model, 'DateFrom')->textinput([ 
      'readonly'=> true,
      'pluginOptions' => [
      'language' => 'th',
     'format' => 'yyyy-mm-dd hh:ii:ss',
      $model->DateFrom = date('Y-m-d h:i:s')
    ]
])  ?> 

    <?= $form->field($model, 'DateTo')->textinput([ 
      //'readonly'=> true,
      'pluginOptions' => [
      'language' => 'th',
     'format' => 'yyyy-mm-dd hh:ii:ss',
      $model->DateTo = date('Y-m-d h:i:s')
    ]
])->widget(DateTimePicker::classname(), [
    'language' => 'th',
        'readonly'=> true,
      'pluginOptions' => [
        'format' => 'yyyy-mm-dd hh:ii:ss'
    ]
])  ?> 



    <?= $form->field($model, 'NumCus')->textInput() ?>

   <!--  <?if($model3 = Booking::find()->where(['Apart_Id' => $model->Apart_Id,'Room_Id' => $model->Room_Id,'Cus_Id' => $model->Cus_Id])->one()){
             $model->Deposit=$model3->Deposit; ?>
 -->
    <?= $form->field($model, 'Deposit')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([2=>'ใช้งาน'])  ?>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
