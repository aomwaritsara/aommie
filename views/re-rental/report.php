<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\view;
use yii\web\Session;
use app\models\Rental;
use app\models\RentalSearch;

$session = new Session;
$session->open();

$this->title = 'รายงานการเช่าห้องพัก';

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
<center><h3><b><p>รายงานการเช่าห้องพักประจำเดือน <?= $namemonth; ?>ปี<?= $year; ?></p></b></h3></center>
 


<?php 
    echo 
    "<table class='table table-bordered table-hover table-responsive' width='100%'  >
        <tr bgcolor=#CCAACC>
            <td width='6%' align='center' style='font-weight: bold'>ลำดับที่</td>
            <td align='center' style='font-weight: bold'>รหัสห้องพัก</td>
            <td align='center' style='font-weight: bold'>รหัสผู้เช่า</td>
            <td align='center' style='font-weight: bold'>วันที่เข้า</td>
          <td align='center' style='font-weight: bold'>วันที่ออก</td>
           <td align='center' style='font-weight: bold'>สถานะ 1:คืนห้องพัก 2:เช่าห้องพัก</td>
        </tr>";
?>


<?php foreach ($model as $key => $value) : ?>
    <?php 
        $phpdate = strtotime($value->StartDate);
        $mysqlyear = date( 'Y', $phpdate ); 
        $mysqldate = date( 'm', $phpdate );
    ?>
    
    <?php if(($mysqlyear==$year)&&($mysqldate==$month)): ?>
        <?php 
                $sequence++;
                $data = "
        <tr>
            <td align='center'>".$sequence."</td>
            <td align='center' style='vertical-align:middle'>".$value["Room_Id"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["Cus_Id"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["StartDate"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["DateFrom"]."</td>
             <td align='center' style='vertical-align:middle'>".$value["Status"]."</td>
        </tr>
    ";

    echo $data;

	?>

   <?php endif ?>
<?php endforeach ?>

</table>