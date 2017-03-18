<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SetService */

$this->title = 'Create Set Service';
$this->params['breadcrumbs'][] = ['label' => 'Set Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
