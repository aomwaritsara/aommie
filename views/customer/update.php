<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Update Customer: ' . $model->Cus_Id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Cus_Id, 'url' => ['view', 'id' => $model->Cus_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-update">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>แก้ไขข้อมูลส่วนตัวผู้เข้าพัก</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
