<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Restore */

$this->title = 'Update Restore: ' . $model->Apart_Id;
$this->params['breadcrumbs'][] = ['label' => 'Restores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Apart_Id, 'url' => ['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="restore-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
