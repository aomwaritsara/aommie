<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetserviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setservices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setservice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setservice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
             ['attribute'=>'Type',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
               $Type=['A'=>"<label>ทั่วไป</label>",'B'=>"<label>ร้านค้า</label>"];
               return $Type[$data->Type];
            },
           
            'filter' =>Html::activeDropDownList($searchModel,'Type',['A'=>'ทั่วไป','B'=>'ร้านค้า'],['class'=>'form-control','prompt'=>'เลือกประเภท']),
 ],
            'sevice.Name',
             
            //'Price',
           // 'Eletricity',
            // 'Watersupply',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
