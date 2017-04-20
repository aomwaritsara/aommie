<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = 'แก้ไขตั้งค่าอัตราค่าใช้จ่าย: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->Service_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-update">
<br><br>
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>แก้ไขตั้งค่าอัตราค่าใช้จ่าย</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'Service'=>$Service,
    ]) ?>

</div>
