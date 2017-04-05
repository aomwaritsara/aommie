<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */

$this->title = 'เพิ่มข้อมูลตั้งค่าอพาร์ตเมนต์';
$this->params['breadcrumbs'][] = ['label' => 'Set Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-room-create">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ตั้งค่าอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

   <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
       
    ]) ?>


</div>
