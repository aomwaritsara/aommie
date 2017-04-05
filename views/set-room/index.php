<?php
use app\models\Room;
use app\models\RoomSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetRoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตั้งค่าอพาร์ตเมนต์';
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
  <!--   <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Apart_Id',
            'Room_Id',
            //'Type',
            //'Price',
            //'Eletricity',
            // 'Watersupply',
        

                ['attribute'=>'Type',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
               $Type=['A'=>"<label>ทั่วไป</label>",'B'=>"<label>ร้านค้า</label>"];
               return $Type[$data->Type];
            },
           
            'filter' =>Html::activeDropDownList($searchModel,'Type',['A'=>'ทั่วไป','B'=>'ร้านค้า'],['class'=>'form-control','prompt'=>'เลือกประเภท']),
 ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
