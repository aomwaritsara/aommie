<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'เพิ่มข้อมูลการเช่าห้องพัก';
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-create">
  <br><br>
  <?php if ($Deposit_alert=='1'): ?>
    
              <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>จำนวนเงินมัดจำไม่ตรงกับการจองห้องพัก !</strong> กรุณาตรวจสอบอีกครั้ง
        </div>
    <?php endif ?>

    <?php if ($CusId_alert=='1'): ?>
         
              <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>รหัสประจำตัวประชาชนไม่ตรงกับข้อมูลการจองห้องพัก !</strong> กรุณาตรวจสอบอีกครั้ง
        </div>
    <?php endif ?>

<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การเช่าห้องพัก</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdated' => 0,
    ]) ?>

</div>

</div>