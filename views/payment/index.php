<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
          //  'Cus_Id',
           // 'DateFrom',
            //'Sor_Id',
            // 'CurrentDate',
            // 'Elec_Used',
            // 'Water_Used',
            // 'Cost',
            // 'Unit',
            // 'TotalAmount',
            // 'PaymentStatus',

            [
                'attribute'=>'บันทึก',

                'content'=>function($data){
                return Html::a ('<i class="glyphicon glyphiconfile"></i>บันทึก', Url::to (['booking/create']),['class'=>'btn btn-xs btn-primary']);

            },
            'contentOptions'=>['class'=>'text center']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
