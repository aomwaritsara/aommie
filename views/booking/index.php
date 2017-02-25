<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Booking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
            'Cus_Id',
            'Booking_Date',
            'Status',
            // 'Datestatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
