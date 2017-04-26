<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RestoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การคืนห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restore-index">
<br><br>
   <div class="box box-info box-solid">
        <div class="box-header with-border">
            <h4>การคืนห้องพัก</h4>
            <!-- <div class="box-tools pull-right">
            <?//= Html::a('<span class = "fa fa-plus"></span> พิมพ์ใบเสร็จการคืนห้องพัก', ['print-restore/index'], ['class' => 'btn btn-block btn-primary', 'target' => '_blank']) ?>

            </div> -->
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
            //'DateFrom',
            //'DateTo',
            //'NumCus',
            //'Deposit',
            // 'Status',
            ['attribute' => 'สถานะการคืนห้องพัก',     
                'contentOptions' => ['class'=>'text-center'],
                'content'=>function($data){
                    $Status=['2'=>"<label>ยังไม่ได้คืน</label>",'1'=>"<label>คืนแล้ว</label>"];
                    return $Status[$data->Status];
                },
                //'filter' =>Html::activeDropDownList($searchModel,'Status',['0'=>'ยังไม่ได้จ่าย','1'=>'จ่ายแล้ว'],['class'=>'form-control','prompt'=>'เลือกสถานะ']),

            ],
            [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{print-restore} {changer} ',
                'contentOptions' => ['class'=>'text-center']
            ],

            
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


        