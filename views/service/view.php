<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = 'ตั้งค่าอัตราค่าใช้จ่าย';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-view">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>ตั้งค่าอัตราค่าใช้จ่าย</h4>
    <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Service_Id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Service_Id',
            'Name:ntext',
            'Price',
            'Unit',
        ],
    ]) ?>

</div>
