<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'Create Staff';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-create">

   <div class="box box-success box-solid">
            <div class="box-header with-border">
    <h4>จัดการข้อมูลผู้ประกอบการ</h4>
    <div class="box-tools pull-right">
              
               
              </div>
              <!-- /.box-tools -->
            </div>
           


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>