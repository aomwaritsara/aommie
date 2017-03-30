<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'aaaa';

?>

<h3>เปลี่ยนรหัสผ่าน</h3>
<div class="col-md-1"></div>
<div class="col-md-10">
	<div class="col-md-3"></div>
	<div class="well col-md-6">
		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($current, 'password')->passwordInput(['value' => false, 'autofocus' => true])->label('รหัสผ่านปัจจุบัน'); ?>
		<?= $form->field($model, 'Password')->passwordInput(['value' => false])->label('รหัสผ่านใหม่'); ?>

		<button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3"></div>
</div>
<div class="col-md-1"></div>