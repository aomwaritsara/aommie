<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
use yii\web\Session;

$session = new Session;
$session->open();
$this->title = 'ข้อมูลอพาร์ตเมนต์';
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartment-view">
<br><br>

<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ข้อมูลอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Apart_Id], ['class' => 'btn btn-primary']) ?>
     <?= Html::a('Cencel', ['cencel', 'id' => $model->Apart_Id], [
            'class' => 'btn btn-warning',
            'data' => [
                'confirm' => 'ยกเลิก?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Apart_Id',
            'Staff_Id',
            'Name:ntext',
            'Address:ntext',
            'Tel',
            'Email:email',
            'NumRoom',
            'NumFloor',
           // 'Status',
            [
             'attribute' => 'Status',
             'format'=>'raw',
             'value'=>$model->Status ? 'ใช้งาน' : 'ระงับการใช้งาน'
        ],

        ],
    ]) ?>

</div>
