<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Booking */
Yii::$app->formatter->locale = 'Asia-BKK';

$this->title = 'การจองห้องพัก';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">
<br><br>
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การจองห้องพัก</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id,'Booking_Date' => $model->Booking_Date], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Apart_Id',
            'Room_Id',
            'Cus_Id',
            'cus.Fname',
          'cus.Lname',
            'Deposit:decimal',
            'Booking_Date:date',
           //'Status',
             [
             'attribute' => 'Status',
             'format'=>'raw',
             'value'=>$model->Status ? 'จองห้องพัก' : 'ยกเลิก'
        ],
          //  'Datestatus',
        ],
    ]) ?>

</div>

