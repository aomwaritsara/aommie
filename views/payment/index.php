<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ใบวางบิล';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ใบวางบิล</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span>พิมพ์ใบวางบิล', ['print-payment/index'], ['class' => 'btn btn-block btn-primary ']) ?>
               
              </div>
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
            // 'NumCus',
            // 'Deposit',
            // 'Status',
[
                'attribute'=>'Action',

                'content'=>function($data){
                return Html::a ('<i class="glyphicon glyphiconfile"></i>เก็บเงิน', Url::to (['payment/create','Apart_Id'=>$data->Apart_Id,'Room_Id'=>$data->Room_Id,'Cus_Id'=>$data->Cus_Id]),['class'=>'btn btn-xs btn-primary']);

            },
            'contentOptions'=>['class'=>'text center']
            ],

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

        