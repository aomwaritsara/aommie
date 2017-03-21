<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
use yii\web\Session;

$session = new Session;
$session->open();
$this->title = 'Update Apartment: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->Apart_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apartment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
