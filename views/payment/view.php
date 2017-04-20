<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
// use app\models\History;
// use app\models\HistorySearch;
Yii::$app->formatter->locale = 'Asia-BKK';

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->title = 'ห้อง :'. $model->Room_Id;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-view">
<br><br>
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>บันทึกข้อมูลการออกใบวางบิล</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>

    <h1><?= Html::encode($this->title) ?></h1>
   
<!-- 

    <p>
        <?= Html::a('Update', ['update', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Apart_Id',
            'Room_Id',
            'Cus_Id',
           // 'DateFrom',
          //  'DateTo',
           // 'NumCus',
          //  'Deposit',
            //'Status',
            'CheckDate:date',
            'Elec_Used',
            'Water_Used',
           // 'Cost',
            'TotalPrice',
            //'PaymentStatus',
            [
             'attribute' => 'PaymentStatus',
             'format'=>'raw',
             'value'=>$model->PaymentStatus ? 'จ่ายแล้ว' : 'ยังไม่ได้จ่ายเงิน'
        ],
        ],
    ]) ?>

     <p align="center"><a href="<?= Url::to(['payment/index']) ?>"<button class="btn">กลับ</button></a></p>

</div>
