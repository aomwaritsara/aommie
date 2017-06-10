<?php

use yii\helpers\Html;
use app\models\History;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->title = 'บันทึกข้อมูลการออกใบวางบิล';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-create" >

<div class="box box-info box-solid">
    <div class="box-header with-border">
        <h4>การออกใบวางบิล</h4>
    </div>

    <div style="margin-left: 10px">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
            'getRental' => $getRental,
            'getApartment' => $getApartment,
            'getRoom' => $getRoom,
            'getCus' => $getCus,
        ]) ?>    
    </div>
    

</div>
