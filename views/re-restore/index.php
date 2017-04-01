<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReRestoreStoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานการคืนห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restore-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
     <div class="row clearfix">
                                <div class="col-sm-6">
                                
<select class="form-control show-tick" name="Selectdate">
                                        <option value>-- เลือก --</option>
                                        <option value="1">มกราคม</option>
                                        <!-- <option value="-1 week">สินค้าจมที่ไม่ได้เบิกมากกว่า 1 สัปดาห์</option> -->
                                        <option value="2">กุมภาพันธุ์</option>
                                        <option value="3">มีนาคม</option>
                                        <option value="4">เมษายน</option>
                                    </select>
                                    <div class="col-sm-10">
                                <button type="submit"  class="btn btn-danger select-modal" name="Search" >คกลง</button>
                                </div>
                        </div>
                        </div>        

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Apart_Id',
            'Room_Id',
            'Cus_Id',
           // 'DateFrom',
            'DateTo',
            // 'NumCus',
            // 'Deposit',
            // 'Status',


          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
