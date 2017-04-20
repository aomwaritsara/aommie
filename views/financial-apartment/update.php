<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */

$this->title = 'แก้ไขค่าใช้จ่ายกิจการ: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Financial Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="financial-apartment-update">
<br><br>
 <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ค่าใช้จ่ายกิจการ</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'Finan' => $Finan,
        'apartment' => $apartment,
    ]) ?>

</div>
