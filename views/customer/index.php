<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลส่วนตัวผู้เข้าพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">
<div class="box box-info box-solid">
    <div class="box-header with-border">
    <h4>ข้อมูลส่วนตัวผู้เข้าพัก</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลส่วนตัวผู้เข้าพัก', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
               
              </div>
              <!-- /.box-tools -->
            </div>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Cus_Id',
            'Fname',
            'Lname',
            //'Tel',
            //'Email:email',
            // 'Address:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
