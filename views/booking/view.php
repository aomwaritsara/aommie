<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */

$this->title = $model->Apart_Id;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Apart_Id',
            'Room_Id',
            'Cus_Id',
            'Booking_Date',
            'Status',
            'Datestatus',
        ],
    ]) ?>

</div>
