<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'ข้อมูลผู้ดูแล';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-view">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ข้อมูลผู้ดูแล</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Staff_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cencel', ['cencel', 'id' => $model->Staff_Id], [
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
            'Staff_Id',
            'Username',
            'Password',
            'Name',
            'Tel',
            'Email:email',
            'Address:ntext',
            'Status',
            'Type',
        ],
    ]) ?>

</div>
