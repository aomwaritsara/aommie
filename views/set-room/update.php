<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */

$this->title = 'แก้ไขการตั้งค่าอพาร์ตเมนต์: ' . $model->Room_Id;
$this->params['breadcrumbs'][] = ['label' => 'Set Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Apart_Id, 'url' => ['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php
  $i=0;
  foreach ($numRoom as $key => $value) {
    $i++;
  }
?>
<div class="set-room-update">
<br><br>
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การตั้งค่าอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

      <?= $this->render('_form', [
        'model' => $model,
        'model2' =>$model2,
        'FloorNumber'=> $FloorNumber,
           
    ]) ?>

</div>
