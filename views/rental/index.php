<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rentals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rental', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'Apart_Id',
            'Room_Id',
            'Cus_Id',
            //'DateFrom',
            //'DateTo',
            // 'NumCus',
            // 'Deposit',
             'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>