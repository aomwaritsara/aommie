<?php
use app\models\Room;
use app\models\RoomSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */

$this->title = 'ตั้งค่าอพาร์ตเมนต์';
$this->params['breadcrumbs'][] = ['label' => 'Set Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-room-view">
<div class="box box-info box-solid">
            <div class="box-header with-border">
    <h4>การตั้งค่าอพาร์ตเมนต์</h4>
    <div class="box-tools pull-right">
                
               
              </div>
              <!-- /.box-tools -->
            </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
            'attributes' => [
            'Apart_Id',
            'Room_Id',
            //'Type',
            [
             'attribute' => 'Type',
             'format'=>'raw',
             'value'=>'Type'? 'ทั่วไป' : 'ร้านค้า'
            // 'value'=>'room.Status' ? 'จอง' : 'ไม่พร้อมใช้งาน'
        ],
            'Price',
            'Eletricity',
            'Watersupply',
            'room.Name',
            'room.Floor',
            //'room.Status',
             [
             'attribute' => 'room.Status',
             'format'=>'raw',
             'value'=>'room.Status'? 'ใช้งาน' : 'เช่า'
            // 'value'=>'room.Status' ? 'จอง' : 'ไม่พร้อมใช้งาน'
        ],

        

    ],
    ]) ?>

</div>

 