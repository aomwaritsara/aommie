<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */

$this->title = 'เพิ่มข้อมูลค่าใช้จ่ายกิจการ';
$this->params['breadcrumbs'][] = ['label' => 'Financial Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-apartment-create">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>เพิ่มข้อมูลค่าใช้จ่ายกิจการ</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>

    <?= $this->render('_form', [
        'model' => $model,
        'Finan' => $Finan,
        'apartment' => $apartment,
    ]) ?>

</div>
