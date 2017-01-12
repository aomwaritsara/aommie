<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */

$this->title = 'Create Set Room';
$this->params['breadcrumbs'][] = ['label' => 'Set Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-room-create">

   

    <div class="box box-success box-solid">
            <div class="box-header with-border">
    <h4>ตั้งค่าอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
               
               
              </div>
              <!-- /.box-tools -->
            </div>

    <?= $this->render('_form', [
        'model' => $model,
        'modell'=> $modell,
    ]) ?>

</div>
</div>
