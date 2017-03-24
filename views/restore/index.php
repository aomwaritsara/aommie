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

   <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การคืนห้องพัก</h4>
    <div class="box-tools pull-right">
              
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
           // 'DateTo',
            // 'NumCus',
            // 'Deposit',
          //  'Status',
            //  [
            //     'attribute'=>'คืนห้องพัก',
            //     'content'=>function($data){
            //     return Html::a ('<i class="glyphicon glyphiconfile"></i>คืนห้องพัก', Url::to (['printbill/index']),['class'=>'btn btn-xs btn-primary']);
            // },
            // //'contentOptions'=>['class'=>'text center']
            // ],
            [
                
                'class' => 'yii\grid\ActionColumn',
                'template' => '{changer}',
                'contentOptions' => ['class'=>'text center']
            ],

            
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
