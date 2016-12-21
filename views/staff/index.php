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

    <div class="box box-success">
            <div class="box-header with-border">
              <h4>จัดการข้อมูลผู้ประกอบการ</h4>
              <div class="box-tools pull-right">
                <?= Html::a('เพิ่มข้อมูลผู้ประกอบการ', ['create'], ['class' => 'btn btn-success']) ?>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Staff_Id',
            'Username',
            'Password',
            'Name',
            'Tel',
            // 'E-mail',
            // 'Address:ntext',
            // 'Status',
            // 'Type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            </div>
            <!-- /.box-body -->
          </div>

</div>

