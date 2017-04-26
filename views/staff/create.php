<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'เพิ่มข้อมูลผู้ดูแล';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-create">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ข้อมูลผู้ดูแล</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>