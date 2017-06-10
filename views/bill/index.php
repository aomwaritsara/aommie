<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <div class="box box-info box-solid">
		<div class="box-header with-border">
			<h4>ใบเสร็จชำระเงิน</h4>
			<div class="box-tools pull-right">
			<?= Html::a('<span class = "fa fa-plus"></span> พิมพ์ใบเสร็จชำระเงิน', ['print-bill/index'], ['class' => 'btn btn-block btn-primary', 'target' => '_blank']) ?>

			</div>
			<!-- /.box-tools -->
		</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'Apart_Id',
            'Room_Id',
            'Cus_Id',
            'DateFrom',
            // 'SoR_Id',
            'CheckDate',
            // 'Elec_Used',
            // 'Water_Used',
            // 'Cost',
            'TotalPrice',
            // 'PaymentStatus', 

            ['attribute' => 'สถานะการจ่ายเงิน', 	
				'contentOptions' => ['class'=>'text-center'],
				'content'=>function($data){
					$PaymentStatus=['0'=>"<label>ยังไม่ได้จ่าย</label>",'1'=>"<label>จ่ายแล้ว</label>"];
					return $PaymentStatus[$data->PaymentStatus];
				},
				'filter' =>Html::activeDropDownList($searchModel,'PaymentStatus',['0'=>'ยังไม่ได้จ่าย','1'=>'จ่ายแล้ว'],['class'=>'form-control','prompt'=>'เลือกสถานะ']),

			],
			[
		        'class' => 'yii\grid\ActionColumn',
		        'template' => '{change}',
		        'contentOptions' => ['class'=>'text center']
		    ],
        ],
    ]); ?>
    </div>
</div>

        