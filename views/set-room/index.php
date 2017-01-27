<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetRoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตั้งค่าอพาร์ตเมนต์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-room-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มการตั้งค่าอพาร์ตเมนต์', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Apart_Id',
            'Room_Id',
            'Name',
            'Floor',
            'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
