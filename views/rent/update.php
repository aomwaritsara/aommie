<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */

$this->title = 'Update Rent: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
