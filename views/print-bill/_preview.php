<?php
use yii\helpers\Html;
use app\models\Customer;
use app\models\Roomtype;
use app\models\Rental;
use app\models\Service;
use app\models\Serviceofrental;

?>

<?php foreach ($model as $key => $value) : ?>
		
	<?php 
		$getRental = Rental::find()->where(['Room_Id' => $value->Room_Id, 'Cus_Id' => $value->Cus_Id])->one();
		$getCus = Customer::findone($value->Cus_Id);
		$getRoomType = Roomtype::find()->where(['Room_Id' => $value->Room_Id])->one();
	?>

	<?php
		$getRental->DateTo = date('m');
		$getMonth = $getRental->DateTo;
		$getMonth--;

		switch ($getMonth) {
            case '1':
                $month = 'มกราคม';
                break;
            case '2':
                $month = 'กุมภาพันธ์';
                break;
            case '3':
                $month = 'มีนาคม';
                break;
            case '4':
                $month = 'เมษายน';
                break;
            case '5':
                $month = 'พฤษภาคม';
                break;
            case '6':
                $month = 'มิถุนายน';
                break;
            case '7':
                $month = 'กรกฎาคม';
                break;
            case '8':
                $month = 'สิงหาคม';
                break;
            case '9':
                $month = 'กันยายน';
                break;
            case '10':
                $month = 'ตุลาคม';
                break;
            case '11':
                $month = 'พฤศจิกายน';
                break;
            case '0':
                $month = 'ธันวาคม';
                break;
        }

        $date = date('d/m');
        $year = date('Y')+543;
	?>

	<h4 align = "center" style="font-size: 16pt">
		ใบเสร็จรับเงิน <br>
		อินเตอร์เรสเรสสิเด้นท์<br>
	</h4>

	<p style="font-size: 14pt">
	วันที่ <?= $date."/".$year ?> <br> 
	เลขห้อง <?= $value->Room_Id ?> <br>
	ได้รับเงินจาก <?= $getCus->Fname." ".$getCus->Lname ?> <br>
	ประจำเดือน <?= $month ?> <br>
	จำนวนเงินทั้งสิ้น <?= $value->TotalPrice ?> บาท <br>
	</p>

	<p>
		ลงชื่อ  ___________________________________  เจ้าหน้าที่
	</p>

	<p>
		<u>หมายเหตุ</u>
	</p>
	<br><br>


	<hr>





<?php endforeach; ?>