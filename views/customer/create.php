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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
     
    ]) ?>

</div>
