<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetRoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Set Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="set-room-index">

    <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ตั้งค่าอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลตั้งค่าอพาร์ตเมนต์', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
               
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
            //'Name',
            'Floor',
            'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>