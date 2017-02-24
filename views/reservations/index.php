<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Booking;
use app\models\BookingSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reservations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Apart_Id',
            'Room_Id',
            'Name',
            'Floor',
            'Status',
            [
                'attribute'=>'จองห้องพัก',
                'content'=>function($data){
                return Html::a ('<i class="glyphicon glyphiconfile"></i>จองห้องพัก', Url::to (['booking/create']),['class'=>'btn btn-xs btn-primary']);
            },
            'contentOptions'=>['class'=>'text center']
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


