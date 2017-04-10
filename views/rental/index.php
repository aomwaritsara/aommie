<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เช่าห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-index">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การเช่าห้องพัก</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลการเช่าห้องพัก', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
               
              </div>
              <!-- /.box-tools -->
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
            'Cus_Id',
            //'StartDate',
            //'DateFrom',
            //'DateTo',
            // 'NumCus',
            // 'Deposit',
             //'Status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} ',
               // 'contentOptions' => ['class'=>'text center']
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
