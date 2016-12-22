<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */

$this->title = 'Update Set Room: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Set Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="set-room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
