<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
            //'Cus_Id',
            //'DateFrom',
       
            // 'CurrentDate',
            // 'Elec_Used',
            // 'Water_Used',
            // 'Cost',
            // 'Unit',
            'TotalAmount',
             //'PaymentStatus',
              
                ['attribute'=>'สถานะการจ่ายเงิน',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
               $PaymentStatus=['0'=>"<label>ยังไม่ได้จ่าย</label>",'1'=>"<label>จ่ายแล้ว</label>"];
               return $PaymentStatus[$data->PaymentStatus];
            },
           
           
            'filter' =>Html::activeDropDownList($searchModel,'PaymentStatus',['0'=>'ยังไม่ได้จ่าย','1'=>'จ่ายแล้ว'],['class'=>'form-control','prompt'=>'เลือกสถานะ']),


             ],
             [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{change}',
                'contentOptions' => ['class'=>'text center']
            ],

            
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
