<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'Create Rental';
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-create">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>เพิ่มข้อมูลการเช่าห้องพัก</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdated' => 0,
    ]) ?>

</div>
