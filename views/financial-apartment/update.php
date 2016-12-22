<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */

$this->title = 'Update Financial Apartment: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Financial Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="financial-apartment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
