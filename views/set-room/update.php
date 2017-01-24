<?php

use yii\helpers\Html;
use app\models\SetRoom ;
use app\models\Roomtype; 
/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */

$this->title = 'Update Set Room: ' . $model1->Name;
$this->params['breadcrumbs'][] = ['label' => 'Set Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model1->Name, 'url' => ['view', 'Apart_Id' => $model1->Apart_Id, 'Room_Id' => $model1->Room_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="set-room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model1' => $model1,
        'model2' => $model2,
    ]) ?>

</div>
