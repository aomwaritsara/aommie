<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'แก้ไขการเช่าห้องพัก: ' . $model->Room_Id;
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Apart_Id, 'url' => ['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id,'StartDate' => $model->StartDate]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rental-update">
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
        'isUpdated' => 1,
    ]) ?>

</div>
