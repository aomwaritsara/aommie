<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RestoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restore-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Restore', ['create'], ['class' => 'btn btn-success']) ?>
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
           // 'DateTo',
            // 'NumCus',
            // 'Deposit',
             'Status',
             [
                'attribute'=>'คืนห้องพัก',
                'content'=>function($data){
                return Html::a ('<i class="glyphicon glyphiconfile"></i>คืนห้องพัก', Url::to (['printbill/index']),['class'=>'btn btn-xs btn-primary']);
            },
            'contentOptions'=>['class'=>'text center']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
