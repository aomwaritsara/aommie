<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReFinancialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$session = new Session;
$session->open();

$this->title = 'รายงานรายจ่ายรวม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="re-income-index">
 <div class="box-header with-border">
 
  
              <!-- /.box-tools -->
            </div>
       
    <h1><?= Html::encode($this->title) ?></h1>
<table class="table table-bordered table-hover table-responsive" width="100%" >
                    <?php 
                        $i='1';


                            $headTable = 
                            "<tr bgcolor=#87FF8D>
                                <td align='center' style='font-weight: bold'>ลำดับที่</td>
                                <td align='center' style='font-weight: bold'> รายงานรายรับประจำเดือน </td>
                            </tr>";
                            echo $headTable;
                            foreach ($monthday as $key => $value) {
                                $phpdate = strtotime($value->CheckDate);
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
                                
                                if ($value->CheckDate != NULL) {
                                    echo "<tr>";
                                    echo "<td width='10%'align='center'>".$i."</td>";
                                    $session["month"] = $month;
                                    echo "<td align='center'><a href=".Url::to(['report', 'month' => $mysqldate]).">รายงานประจำเดือน ".$month."</a></td>";
                                    echo "</tr>";
                                    $i++;
                                }   
                            
                        }
                    