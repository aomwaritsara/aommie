<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = 'เพิ่มข้อมูลตั้งค่าบริการเสริม';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-create">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ตั้งค่าบริการเสริม</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
