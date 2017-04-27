<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'แก้ไขข้อมูลผู้ดูแล: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->Staff_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-update">
<br><br>
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ข้อมูลผู้ดูแล</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
