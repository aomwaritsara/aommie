<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roomtype */

$this->title = 'Update Roomtype: ' . $model->Apart_Id;
$this->params['breadcrumbs'][] = ['label' => 'Roomtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Apart_Id, 'url' => ['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roomtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
