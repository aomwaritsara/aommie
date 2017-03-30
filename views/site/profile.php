<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'Update Staff: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->Staff_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-member', [
        'model' => $model,
    ]) ?>

</div>
