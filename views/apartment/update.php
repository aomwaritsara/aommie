<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
use yii\web\Session;

$session = new Session;
$session->open();
$this->title = 'แก้ไขข้อมูลอพาร์ตเมนต์: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->Apart_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apartment-update">
<br><br>

<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ข้อมูลอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'Apa' => $Apa,
    ]) ?>

</div>
