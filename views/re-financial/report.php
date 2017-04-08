<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\view;
use yii\web\Session;
use app\models\Restore;
use app\models\RestoreSearch;

$session = new Session;
$session->open();

$this->title = 'รายงานรายจ่ายรวม';

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
<center><h3><b><p>รายงานรายจ่ายประจำเดือน <?= $session["month"]; ?></p></b></h3></center>
 


<?php 
    echo 
    "<table class='table table-bordered table-hover table-responsive' width='100%'  >
        <tr bgcolor=#87FF8D>
            <td width='6%' align='center' style='font-weight: bold'>ลำดับที่</td>
            <td align='center' style='font-weight: bold'>รหัสบัญชีอพาร์ตเมนต์</td>
            <td align='center' style='font-weight: bold'>วันที่</td>
            <td align='center' style='font-weight: bold'>กิจการที่ชำาระให้</td>
            <td align='center' style='font-weight: bold'>รายการ</td>
             <td align='center' style='font-weight: bold'>ราคา</td>index.php 
             <td align='center' style='font-weight: bold'>จำนวน</td>
              <td align='center' style='font-weight: bold'>ราคารวม</td>
        </tr>";
?>



<?php foreach ($model as $key => $value) : ?>
	<?php 
	$sequence++;
	$data = "
        <tr>
            <td align='center'>".$sequence."</td>
            <td align='center' style='vertical-align:middle'>".$value["Finan_Id"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["Date"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["Destination"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["Name"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["Amount"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["Price"]."</td>
            <td align='center' style='vertical-align:middle'>".$value["TotalPrice"]."</td>
           
        </tr>
    ";

    echo $data;

	?>

<?php endforeach; ?>

</table>