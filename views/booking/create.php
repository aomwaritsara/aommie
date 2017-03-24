<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Booking */

$this->title = 'Create Booking';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-create">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>เพิ่มข้อมูลการจองห้องพัก</h4>
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
