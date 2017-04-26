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
<!-- <html>
<head>
<style>
a:visited {
    color: yellow;
}
</style>
</head> -->
<div class="payment-index">
 <br><br>
    <?php if ($payment_alert=='1'): ?>
        <br><br>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>ไม่สามารถพิมพ์ใบวางบิลได้!</strong> กรุณาเพิ่มข้อมูลการออกใบวางบิลให้ครบ
        </div>
    <?php endif ?>

    <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ใบวางบิล</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span> พิมพ์ใบวางบิล', ['print-payment/index'], ['class' => 'btn btn-block btn-primary'/*, 'target' => '_blank'*/]) ?>
               
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
            //'Cus_Id',

             ['attribute' =>'Cus_Id',
            'value' => 'cus.Fname',
           'filter' => $searchModel,
          ],
          
     
            //'history.PaymentStatus',
            //'DateFrom',
            //'DateTo',
            // 'NumCus',
            // 'Deposit',
            // 'Status',
       
            [


                //'attribute'=>'บันทึกการเก็บเงิน',
                 'contentOptions' => ['class'=>'text-center'],
                 'content'=>function($data){
                return Html::a ('<i class="glyphicon glyphiconfile"></i>บันทึกการเก็บเงิน', Url::to (['payment/create','Apart_Id'=>$data->Apart_Id,'Room_Id'=>$data->Room_Id,'Cus_Id'=>$data->Cus_Id]),['class'=>'btn btn-md btn-primary' ]);

            },
            //    if($PaymentStatus == '0'){
            //     echo "ok";
            // },
            ],
          

            [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}       ',
                'contentOptions' => ['class'=>'text-center'],
            ],
           //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

        