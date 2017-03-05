<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เช่าห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Apart_Id',
            'Room_Id',
            'Name',
             ['attribute'=>'Floor',
            'contentOptions' => ['class'=>'text-center'],
            'content'=>function($data){
                 $Floor=['1'=>"1",'2'=>"2",'3'=>"3"];
               return $Floor[$data->Floor];
              
            },
           
            'filter' =>Html::activeDropDownList($searchModel,'Floor',['1'=>'1','2'=>'2','3'=>'3'],['class'=>'form-control','prompt'=>'เลือกชั้น']),
 ],
            //'Status',
                 
            [
                'attribute'=>'เช่าห้องพัก',

                'content'=>function($data){
                return Html::a ('<i class="glyphicon glyphiconfile"></i>เช่าห้องพัก', Url::to (['rental/create']),['class'=>'btn btn-xs btn-primary']);

            },
            'contentOptions'=>['class'=>'text center']
            ],
            
            
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>