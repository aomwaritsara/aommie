<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตั้งค่าอัตราค่าใช่จ่าย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">
<br><br>
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ตั้งค่าอัตราค่าใช้จ่าย</h4>
    <div class="box-tools pull-right">
              <!--   <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลตั้งค่าอัตราค่าใช้จ่าย', ['create'], ['class' => 'btn btn-block btn-primary ']) ?> -->
               
              </div>
              <!-- /.box-tools -->
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Service_Id',
            'Name:ntext',
            'Price',
            //'Unit',

            [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} ',
               // 'contentOptions' => ['class'=>'text center']
            ],
        ],
    ]); ?>
</div>
