<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
Yii::$app->formatter->locale = 'Asia-BKK';
/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'การเช่าห้องพัก';
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-view">
<br><br>
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การเช่าห้องพัก</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id,'StartDate' => $model->StartDate], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Apart_Id',
            'Room_Id',
            'Cus_Id',
             'cus.Fname',
          'cus.Lname',
            //'DateFrom',
            'StartDate:date',
            //'DateTo',
            'NumCus',
            'Deposit:decimal',
            //'Status',
             [
             'attribute' => 'Status',
             'format'=>'raw',
             'value'=>$model->Status ? 'เช่าห้องพัก' : 'ยกเลิก'
        ],
         
        ],
    ]) ?>

</div>
