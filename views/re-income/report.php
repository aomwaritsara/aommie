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

        <center><h3><b><p>รายงานรายรับประจำเดือน <?= $namemonth; ?>ปี<?= $year; ?></p></b></h3></center>

        <?php 
            echo 
            "<table class='table table-bordered table-hover table-responsive' width='100%'>
                <tr bgcolor=#87FF8D>
                    <td width='6%' align='center' style='font-weight: bold'>ลำดับที่</td>
                    <td align='center' style='font-weight: bold'>รายการ</td>

                    <td align='center' style='font-weight: bold'>วันที่</td>
             
                      <td align='center' style='font-weight: bold'>ราคารวม</td>
                </tr>";
        ?>

<?php $sum=0; ?>
<?php foreach ($model_history as $key => $value) : ?>
    <?php 
        $phpdate = strtotime($value->CheckDate);
        $mysqlyear = date( 'Y', $phpdate ); 
        $mysqldate = date( 'm', $phpdate );
    ?>
        <?php  echo number_format($value["TotalPrice"]); ?>
    <?php if(($mysqlyear==$year)&&($mysqldate==$month)): ?>
        <?php 
            	$sequence++;
            	$data = "
                    <tr>
                        <td align='center'>".$sequence."</td>
                          <td align='center' style='vertical-align:middle'>"."ค่าเช่าห้อง"."</td>
                        <td align='center' style='vertical-align:middle'>".$value["CheckDate"]."</td>
                      
                      
                        <td align='center' style='vertical-align:middle'>".$value["TotalPrice"]."</td>
                    
                    </tr>
                ";

                echo $data;

                $sum = $sum+$value["TotalPrice"];

        	?>

    <?php endif ?>
<?php endforeach; ?>
<?php foreach ($model_deposit as $key => $value): ?>
    <?php 
        $phpdate = strtotime($value->Date);
        $mysqlyear = date( 'Y', $phpdate ); 
        $mysqldate = date( 'm', $phpdate );
    ?>
    <?php if(($mysqlyear==$year)&&($mysqldate==$month)): ?>
        <?php 
                $sequence++;
                $data = "
                    <tr>
                        <td align='center'>".$sequence."</td>
                          <td align='center' style='vertical-align:middle'>"."ค่ามัดจำ"."</td>
                        <td align='center' style='vertical-align:middle'>".$value["Date"]."</td>
                      
                      
                        <td align='center' style='vertical-align:middle'>".$value["Price"]."</td>
                       
                    </tr>
                ";

                echo $data;

                $sum = $sum+$value["Price"];

            ?>
    <?php endif ?>
<?php endforeach ?>
    <tr bgcolor=#FDFD96>
        <td colspan="2" ></td>
        <td align='center' style='vertical-align:middle'>รวม</td>
        <td align='center' style='vertical-align:middle'><?= $sum;?></td>
    </tr>

</table>