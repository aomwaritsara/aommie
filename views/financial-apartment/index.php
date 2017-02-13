<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FinancialApartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Financial Apartments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-apartment-index">

   <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ค่าใช้จ่ายกิจการ</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลค่าใช้จ่ายกิจการ', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
               
              </div>
              <!-- /.box-tools -->
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'Finan_Id',
            //'Apart_Id',
            //'Date',
            'Destination',
            'Name',
            // 'Amount',
             //'Price',
            // 'TotalPrice',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>