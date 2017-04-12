<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Session;
use yii\models\History;
use app\models\PaymentSearch;
use yii\helpers\ArrayHelper;
use app\models\Payment;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */

$session = new Session;
$session->open();
?>

<?php 
    $listServiceData = array("อินเตอร์เน็ต", "โทรทัศน์", "ตู้เย็น", "อินเตอร์เน็ต+โทรทัศน์", "อินเตอร์เน็ต+ตู้เย็น", "โทรทัศน์+ตู้เย็น", "อินเตอร์เน็ต+โทรทัศน์+ตู้เย็น");
    $listStatusData = array("ยังไม่ได้จ่ายเงิน", "จ่ายเงิน");
?>
<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>
   <?php 

$session = new Session;
$session->open();
?> 

    <?= $form->field($getApartment, 'Apart_Id')->textInput(['readonly' => true]); ?>
    <?= $form->field($getRoom, 'Room_Id')->textInput(['readonly' => true]) ?>
    <?= $form->field($getCus, 'Cus_Id')->textInput(['readonly' => true]) ?>
    <?php 
        $today = date('Y-m-d H:i:s');
        $model->CheckDate = $today;
    ?>
    <?= $form->field($model, 'CheckDate')->textInput(['readonly' => true]) ?>
    <?= $form->field($getRental, 'DateFrom')->textInput(['readonly' => true]) ?> 
    <?= $form->field($model, 'SoR_Id')->dropDownList($listServiceData, ['prompt' => 'ไม่มี'])->label('บริการเสริม') ?>
    <?= $form->field($model, 'Elec_Used')->textInput() ?>
    <?php 
        $water = $getRental->NumCus * $getRoom->Watersupply;
        $model->Water_Used = $water;
    ?>
    <?= $form->field($model, 'Water_Used')->textInput(['readonly' => true]) ?>
    <!-- <?//= $form->field($model, 'PaymentStatus')->dropDownList($listStatusData, ['prompt' => 'เลือกสถานะ']) ?> -->

  
    <center>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </center>
    

    <?php ActiveForm::end(); ?>

</div>

