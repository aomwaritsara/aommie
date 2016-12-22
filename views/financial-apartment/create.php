<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */

$this->title = 'Create Financial Apartment';
$this->params['breadcrumbs'][] = ['label' => 'Financial Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-apartment-create">
<div class="financial-apartment-index">

   <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ค่าใช้จ่ายกิจการ</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
