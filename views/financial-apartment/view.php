<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
Yii::$app->formatter->locale = 'Asia-BKK';

/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */

$this->title = 'ค่าใช้จ่ายกิจการ';
$this->params['breadcrumbs'][] = ['label' => 'Financial Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-apartment-view">
<br><br>
 <div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ค่าใช้จ่ายกิจการ</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id], [
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
            'Finan_Id',
            'Apart_Id',
            'Date:date',
            'Destination',
            'Name',
            'Amount:decimal',
            'Price:decimal',
            'TotalPrice:decimal',
        ],
    ]) ?>

</div>
