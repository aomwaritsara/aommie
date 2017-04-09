<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\Session;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReRentalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 $session = new Session;
        $session->open();
$this->title = 'รายงานการเช่าห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-index">

   
            <div class="box-header with-border">
 
  
              <!-- /.box-tools -->
            </div>
       
    <h1><?= Html::encode($this->title) ?></h1>
<table class="table table-bordered table-hover table-responsive" width="100%" >
                    <?php 
                        $i='1';


                            $headTable = 
                            "<tr bgcolor=#CCAACC>
                                <td align='center' style='font-weight: bold'>ลำดับที่</td>
                                <td align='center' style='font-weight: bold'> รายงานการเช่าห้องพักประจำเดือน </td>
                            </tr>";
                            echo $headTable;
                            foreach ($monthday as $key => $value) {
                                $phpdate = strtotime($value->DateFrom);
                                $mysqldate = date( 'm', $phpdate );
                                switch ($mysqldate) {
                                    case '01':
                                        $month = 'มกราคม';
                                        break;
                                    case '02':
                                        $month = 'กุมภาพันธ์';
                                        break;
                                    case '03':
                                        $month = 'มีนาคม';
                                        break;
                                    case '04':
                                        $month = 'เมษายน';
                                        break;
                                    case '05':
                                        $month = 'พฤษภาคม';
                                        break;
                                    case '06':
                                        $month = 'มิถุนายน';
                                        break;
                                    case '07':
                                        $month = 'กรกฎาคม';
                                        break;
                                    case '08':
                                        $month = 'สิงหาคม';
                                        break;
                                    case '09':
                                        $month = 'กันยายน';
                                        break;
                                    case '10':
                                        $month = 'ตุลาคม';
                                        break;
                                    case '11':
                                        $month = 'พฤศจิกายน';
                                        break;
                                    case '12':
                                        $month = 'ธันวาคม';
                                        break;
                                }
                                if ($value->DateFrom != NULL) {
                                    echo "<tr>";
                                    echo "<td width='10%'align='center'>".$i."</td>";
                                    $session["month"] = $month;
                                    echo "<td align='center'><a href=".Url::to(['report', 'month' => $mysqldate]).">รายงานประจำเดือน ".$month."</a></td>";
                                    echo "</tr>";
                                    $i++;
                                }   
                            
                        }
                    

