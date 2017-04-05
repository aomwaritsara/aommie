<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'ข้อมูลส่วนตัวผู้เข้าพัก ';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ข้อมูลส่วนตัวผู้เข้าพัก</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Cus_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Cus_Id], [
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
            'Cus_Id',
            'Fname',
            'Lname',
            'Tel',
            'Email:email',
            'Address:ntext',
        ],
    ]) ?>

</div>
