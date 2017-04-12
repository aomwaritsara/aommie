<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\view;
use yii\web\Session;


$session = new Session;
$session->open();

$this->title = 'รายงานรายรับรวม';

?>

<style type="text/css">
    #img{
        height: 60px;
        width: 60px;
        display: block;
        position: relative;
        overflow: hidden;
    }
</style>

<?php 
    /*echo "<pre>";
    print_r($payment);
    print_r($model);
    print_r($productModel);
    print_r($product);
    echo "</pre>";*/

    $sequence = 0;
    $last_price = 0;
    $amount = 0; 
    $i=0; 
    $count = 1;
    $last = '';
    
?>
<a href="javascript:history.go(-1)"><button class="btn">กลับ</button></a>

        <center><h3><b><p>รายงานรายรับ-รายจ่ายประจำปี <?= $year; ?></p></b></h3></center>

        <?php 
            echo 
            "<table class='table table-bordered table-hover table-responsive' width='100%'>
                <tr bgcolor=#87FF8D>
                    <td width='6%' align='center' style='font-weight: bold'>ลำดับที่</td>
                    <td align='center' style='font-weight: bold'>เดือน</td>

                    <td align='center' style='font-weight: bold'>รายรับ</td>
             
                      <td align='center' style='font-weight: bold'>รายจ่าย</td>
                </tr>";
        ?>

<?php $sumIn=0; ?>
<?php $sumOut=0; ?>
<?php foreach ($model_history1 as $key => $value) : ?>
    <?php 
        $phpdate = strtotime($value->CheckDate);
        $mysqlyear = date( 'Y', $phpdate ); 
        $mysqldate = date( 'm', $phpdate );
    ?>
    
    <?php if($mysqlyear==$year): ?>
    	<?php 
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
    	?>
        <?php 
            	$sequence++;
        ?>
                    <tr>
                        <td align='center'><?= $sequence; ?></td>
                          <td align='center' style='vertical-align:middle'><?= $month; ?></td>
                        <?php $sum_income=0; ?>
						<?php $sum_outcome=0; ?>
                        <?php foreach ($model_history2 as $key => $value_his) : ?>
						    <?php 
						        $phpdate_in = strtotime($value_his->CheckDate);
						        $mysqlyear_in = date( 'Y', $phpdate_in ); 
						        $mysqldate_in = date( 'm', $phpdate_in );
						    ?>

						    <?php if(($mysqlyear_in==$year)&&($mysqldate_in==$mysqldate)): ?>
						    	<?php $sum_income = $sum_income+$value_his->TotalPrice; ?>
						    <?php endif ?>
						<?php endforeach; ?>
						<?php foreach ($model_deposit as $key => $value_depo): ?>
						    <?php 
						        $phpdate_depo = strtotime($value_depo->Date);
						        $mysqlyear_depo = date( 'Y', $phpdate_depo );
						        $mysqldate_depo = date( 'm', $phpdate_depo );
						    ?>
						    <?php if(($mysqlyear_depo==$year)&&($mysqldate_depo==$mysqldate)): ?>
						    	<?php $sum_income = $sum_income+$value_depo->Price; ?>
						    <?php endif ?>
						<?php endforeach ?>
                        <td align='center' style='vertical-align:middle'><?= $sum_income; ?></td>
                        <?php foreach ($model_Finance as $key => $value_Fi) : ?>
						    <?php 
						        $phpdate_Fi = strtotime($value_Fi->Date);
						        $mysqlyear_Fi = date( 'Y', $phpdate_Fi );
						        $mysqldate_Fi = date( 'm', $phpdate_Fi );
						    ?>
						    
						    <?php if(($mysqlyear_Fi==$year)&&($mysqldate_Fi==$mysqldate)): ?>
						    	<?php $sum_outcome = $sum_outcome+$value_Fi->TotalPrice; ?>
						    <?php endif ?>
						<?php endforeach; ?>
                        <td align='center' style='vertical-align:middle'><?= $sum_outcome; ?></td>
                       
                    </tr>
            <?php
                $sumIn = $sumIn+$sum_income;
                $sumOut = $sumOut+$sum_outcome;
                $sum =  $sumIn+$sumOut;

        	?>
    <?php endif ?>
<?php endforeach; ?>
    <tr >
        <td colspan="1" ></td>
        <td  align='center' style='vertical-align:middle'>รวม</td>
        <td bgcolor=#FDFD96 align='center' style='vertical-align:middle'><?= $sumIn;?></td>
        <td bgcolor=#FDFD96 align='center' style='vertical-align:middle'><?= $sumOut;?></td>
    </tr>

  <tr >
        <td colspan="2" ></td>
        <td align='center' style='vertical-align:middle'>รวมรายได้สุทธิ</td>
        <td bgcolor=Pink align='center' style='vertical-align:middle'><?= $sum;?></td>
       
    </tr>
</table>   


   