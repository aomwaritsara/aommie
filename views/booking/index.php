<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จองห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="booking-index">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การจองห้องพัก</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลการจองห้องพัก', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
               
              </div>
              <!-- /.box-tools -->
            </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Apart_Id',
            'Room_Id',
            'Cus_Id',
            'Deposit',
           // 'Booking_Date',
            // 'Status',
            // 'Datestatus',

             [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {changeb}',
               // 'contentOptions' => ['class'=>'text center']
            ],
        ],
    ]); ?>
    
</div>
