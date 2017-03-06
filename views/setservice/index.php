<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetserviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setservices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setservice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setservice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
            'Type',
            //'Price',
           // 'Eletricity',
            // 'Watersupply',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
