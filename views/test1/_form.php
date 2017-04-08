<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\widgets\MaskedInput;




/* @var $this yii\web\View */
/* @var $model app\models\Test1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test1-form">

    <?php $form = ActiveForm::begin([
    'enableAjaxValidation'      => true, //เปิดการ validate ด้วย AJAX
    'enableClientValidation'    => false, // validate ฝั่ง client เมื่อ submit หรือ เปลี่ยนค่า
    'validateOnChange'          => true,// validate เมื่อมีการเปลี่ยนค่า
    'validateOnSubmit'          => true,// validate เมื่อ submit ข้อมูล
    'validateOnBlur'            => false,// validate เมื่อเปลี่ยนตำแหน่ง cursor ไป input อื่น
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
])
?>
    <?= $form->field($model, 'id')->widget(MaskedInput::className(),[
                'mask'=>'9-9999-99999-99-9'
            ])?>

    <?= $form->field($model, 'amout')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
