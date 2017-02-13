<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */

$this->title = 'Create Set Room';
$this->params['breadcrumbs'][] = ['label' => 'Set Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

   <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
    ]) ?>


</div>
