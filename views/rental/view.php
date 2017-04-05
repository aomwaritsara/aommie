<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'การเช่าห้องพัก';
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-view">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การเช่าห้องพัก</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
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
            'DateFrom',
            'DateTo',
            'NumCus',
            'Deposit',
            //'Status',
             [
             'attribute' => 'Status',
             'format'=>'raw',
             'value'=>$model->Status ? 'เช่าห้องพัก' : 'ยกเลิก'
        ],
         
        ],
    ]) ?>

</div>
