<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Apartment */

$this->title = 'Create Apartment';
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartment-create">

  <div class="box box-success">
           <div class="box-header with-border">
    <h4>จัดการข้อมูลอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
                               
    </div>
              <!-- /.box-tools -->
            </div>
   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>


</div>
