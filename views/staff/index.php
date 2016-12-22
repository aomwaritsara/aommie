<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <div class="apartment-index">

<div class="box box-info box-solid  ">
    <div class="box-header with-border  " >
        <h4>จัดการข้อมูลผู้ประกอบการ</h4>
    <div class="box-tools pull-right">
                <?= Html::a('<span class = "fa fa-plus"></span>เพิ่มข้อมูลผู้ประกอบการ', ['create'], ['class' => 'btn btn-block btn-primary ']) ?>
          
    </div>
              <!-- /.box-tools -->
            </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Staff_Id',
            'Username',
            'Password',
            'Name',
            'Tel',
            // 'Email:email',
            // 'Address:ntext',
            // 'Status',
            // 'Type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>