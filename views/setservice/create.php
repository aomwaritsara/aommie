<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Setservice */

$this->title = 'Create Setservice';
$this->params['breadcrumbs'][] = ['label' => 'Setservices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setservice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
    ]) ?>

</div>
