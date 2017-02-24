<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<p>
    <a href="<?= Url::to(['printbill/index']) ?>"> <div align="right" ><button>พิมใบเสร็จชำระเงิน</button></div></a>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
            'Cus_Id',
            'DateFrom',
            //'Sor_Id',
            // 'CurrentDate',
            // 'Elec_Used',
            // 'Water_Used',
            // 'Cost',
            // 'Unit',
            // 'TotalAmount',
            // 'PaymentStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
