<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลผู้ดูแล';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <div class="box box-info box-solid  ">
    <div class="box-header with-border  " >
        <h4>จัดการข้อมูลผู้ดูแล</h4>
    <div class="box-tools pull-right">
    
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลผู้ประกอบการ', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
          
    </div>
              <!-- /.box-tools -->
            </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'Staff_Id',
            'Username',
            //'Password',
            'Name',
            //'Tel',
            // 'Email:email',
            // 'Address:ntext',
             //'Status',
    ['attribute'=>'Status',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
               $Status=['1'=>"<label>ใช้งาน</label>",'0'=>"<label>ระงับการใช้งาน</label>"];
               return $Status[$data->Status];
            },
           
            'filter' =>Html::activeDropDownList($searchModel,'Status',['1'=>'ใช้งาน','0'=>'ระงับการใช้งาน'],['class'=>'form-control','prompt'=>'เลือกสถานะ']),
 ],
           // 'Type',
              ['attribute'=>'Type',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
               $Type=['1'=>"<label>ผู้ดูแลอพาร์ตเมนต์</label>",'0'=>"<label>ผู้ดูแลระบบ</label>"];
               return $Type[$data->Type];
            },
           
            'filter' =>Html::activeDropDownList($searchModel,'Type',['1'=>'ผู้ดูแลอพาร์ตเมนต์','0'=>'ผู้ดูแลระบบ'],['class'=>'form-control','prompt'=>'เลือกประเภท']),
 ],

             [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {cencel}',
               // 'contentOptions' => ['class'=>'text center']
            ],
        ],
    ]); ?>
</div>
</div>