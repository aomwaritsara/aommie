<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\web\Session;

$session = new Session;
$session->open();
$this->title = 'ข้อมูลอพาร์ตเมนต์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartment-index">
<div class="box box-info box-solid  ">
    <div class="box-header with-border  " >
        <h4>จัดการข้อมูลอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
    
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลอพาร์ตเมนต์', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
          
    </div>
              <!-- /.box-tools -->
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Apart_Id',
            'Name:ntext',
            //'Address:ntext',
            //'Tel',
            'Email:email',
            // 'NumRoom',
            // 'NumFloor',
            // 'Status',
                      ['attribute'=>'Status',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
               $Status=['1'=>"<label>ใช้งาน</label>",'0'=>"<label>ระงับการใช้งาน</label>"];
               return $Status[$data->Status];
            },
           
            'filter' =>Html::activeDropDownList($searchModel,'Status',['1'=>'ใช้งาน','0'=>'ระงับการใช้งาน'],['class'=>'form-control','prompt'=>'เลือกสถานะ']),
 ],

            [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {cencel}',
               // 'contentOptions' => ['class'=>'text center']
            ],
        ],
    ]); ?>
</div>
