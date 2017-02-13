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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Set Room', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Apart_Id',
            'Room_Id',
            'Type',
            //'Price',
            //'Eletricity',
            // 'Watersupply',

             /*   ['attribute'=>'Status',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
               $status =['1'=>"<label>ว่าง</label>",'2'=>"<label>ถูกจอง</label>",'3'=>"<label>ถูกเช่า</label>",'4'=>"<label>ไม่พร้อม</label>"];
               return $status[$data->Status];
            },
           
            'filter' =>Html::activeDropDownList($searchModel,'Status',['1'=>'ว่าง','2'=>'ถูกจอง','3'=>'ถูกเช่า', '4'=>'ไม่พร้อม'],['class'=>'form-control','prompt'=>'เลือกสถานะ']),
 ],
*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
