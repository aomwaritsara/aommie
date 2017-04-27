<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

       <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'Staff_Id')->widget(MaskedInput::className(),[
                'mask'=>'9999999999999'
            ])?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tel')->widget(MaskedInput::className(),[
                'mask'=>'9999999999'
            ])?>

    <?= $form->field($model, 'Email')->widget(MaskedInput::className(),[
                'clientOptions' => [
                    'alias' =>  'email'
                ],
            ])?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ->dropDownList([1=>'ใช้งาน',0=>'ระงับการใช้งาน'])  ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true]) ->dropDownList([1=>'ผู้ดูแลอพาร์ตเมนต์',0=>'ผู้ดูแลระบบ'])  ?>


    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
