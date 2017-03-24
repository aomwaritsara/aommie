<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\History;
use app\models\PaymentSearch;
use yii\helpers\ArrayHelper;
use app\models\Payment;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model2, 'Apart_Id')->textInput(['value'=>$model->Apart_Id]) ?>

    <?= $form->field($model2, 'Room_Id')->textInput(['value'=>$model->Room_Id]) ?>

    <?= $form->field($model2, 'Cus_Id')->textInput(['value'=>$model->Cus_Id]) ?>
         
 
    <input type="checkbox" id="queue-order" name="Queue[order]" value="1" > 1
    <input type="checkbox" id="queue-order2" name="Queue2[order]" value="2" >2
    <input type="checkbox" id="queue-order3" name="Queue4[order]" value="3" >3
    <input type="checkbox" id="queue-order4" name="Que4[order]" value="4" >4
    <p>
    </p>
<p>
<select name="net">
  <option value="300">3 เดือน</option>
  <option value="250">2 เดือน</option>
  <option value="200">1 เดือน</option>

</select>
</p>
<p>
    </p>
    <?= $form->field($model2, 'Elec_Used')->textInput() ?>

    <?= $form->field($model2, 'Water_Used')->textInput(['value'=>$model->NumCus]) ?>

    <?= $form->field($model2, 'PaymentStatus')->textInput(['value'=>'1']) ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
