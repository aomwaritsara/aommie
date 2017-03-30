<?php

use yii\helpers\Html;
use yii\models\Customer;
use app\models\CustomerSearch;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'เพิ่มข้อมูลส่วนตัวลูกค้า';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-create">

<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ข้อมูลส่วนตัวผู้เข้าพัก</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
     
    ]) ?>

</div>
