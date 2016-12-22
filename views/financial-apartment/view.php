<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FinancialApartment */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Financial Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-apartment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Finan_Id',
            'Apart_Id',
            'Date',
            'Destination',
            'Name',
            'Amount',
            'Price',
            'TotalPrice',
        ],
    ]) ?>

</div>
