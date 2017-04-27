<?php
use yii\helpers\Html;
use app\models\Customer;
use app\models\Roomtype;
use app\models\History;
use app\models\Rental;
use app\models\Service;
use app\models\Serviceofrental;

?>

<?php 
	$i=1;
?>

<?php foreach ($model as $key => $value) : ?>
	
	<?php 
		$getRent = Rental::find()->where(['Room_Id' => $value->Room_Id, 'Cus_Id' => $value->Cus_Id])->one();
		$getCus = Customer::findone($value->Cus_Id);
		$getRoomType = Roomtype::find()->where(['Room_Id' => $value->Room_Id])->one();
		$getHistory = History::find()->where(['Room_Id' => $value->Room_Id, 'Cus_Id' => $value->Cus_Id])->one();
	?>

	<?php
		$value->DateTo = date('m');
		$getMonth = $value->DateTo;
		$getMonth;

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
        $startdate =$getRent->StartDate;
        $startdate = date('d/m/Y');
	?>

	<h3 align = "center" style="font-size: 16pt"><strong>
		ใบเสร็จการคืนห้องพัก
		อินเตอร์เรสสิเด้นท์<br>
		ประจำเดือน <?= $month; ?>
	</strong></h3>

	<p style="font-size: 14pt"> 
		เลขห้อง <?= $value->Room_Id ?>
		วันที่ <?= $date."/".$year ?> <br>
		ชื่อ <?= $getCus->Fname." ".$getCus->Lname ?> <br>

		วันที่เริ่มเช่าห้องพัก <?= $startdate ?>
	</p>

	<table class="table" border="1" align="center" style="font-size: 12pt; text-align: center;">
		<tr>
			<td><b>ลำดับ</b></td>
			<td><b>รายการ</b></td>
			<td><b>หน่วย</b></td>
			<td><b>จำนวน</b></td>
			<td><b>หน่วยละ</b></td>
			<td><b>จำนวนเงิน</b></td>
			<td><b></b></td>
		</tr>
		<tr>
			<td>1</td>
			<td>ค่าเช่าห้อง</td>
			<td>บาท</td>
			<td></td>
			<td></td>
			<td><?= number_format("$getRoomType->Price"); ?></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>2</td>
			<td>ค่าไฟฟ้า</td>
			<td>หน่วย</td>
			<?php 
				$nuew = $getHistory->Elec_Used / $getRoomType->Eletricity;
			?>
			<td><?= $nuew ?></td>
			<td><?= $getRoomType->Eletricity ?></td>
			<td><?= number_format("$getHistory->Elec_Used")?></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>3</td>
			<td>ค่าน้ำ</td>
			<td>ห้อง</td>
			<td><?= $value->NumCus; ?></td>
			<td>100</td>
			<td><?= number_format("$getHistory->Water_Used") ?></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>4</td>
			<td>ค่าอินเตอร์เน็ต</td>
			<td>เดือน</td>
			<td></td>
			<td>300</td>
			<td>
			<?php 
				$SV = "SV1"; // Internet
				if ($getHistory->SoR_Id != NULL) {
					$SR = Serviceofrental::find()->where(['SoR_Id' => $getHistory->SoR_Id])->all();
					foreach ($SR as $key => $sr_value) {
						if ($sr_value->Service_Id == "SV1") {
							$service = Service::findone($sr_value->Service_Id);
							echo number_format("$service->Price");
						}	
					}
				}
			?>
			</td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>5</td>
			<td>ค่าเช่าตู้เย็น</td>
			<td>เดือน</td>
			<td></td>
			<td>100</td>
			<td>
			<?php 
				$SV = "SV2"; // Internet
				if ($getHistory->SoR_Id != NULL) {
					$SR = Serviceofrental::find()->where(['SoR_Id' => $getHistory->SoR_Id])->all();
					foreach ($SR as $key => $sr_value) {
						if ($sr_value->Service_Id == "SV2") {
							$service = Service::findone($sr_value->Service_Id);
							echo number_format("$service->Price");
						}		
					}
				}
			?>	
			</td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>6</td>
			<td>ค่าเช่าโทรทัศน์</td>
			<td>เดือน</td>
			<td></td>
			<td>100</td>
			<td>
			<?php 
				$SV = "SV3"; // Internet
				if ($getHistory->SoR_Id != NULL) {
					$SR = Serviceofrental::find()->where(['SoR_Id' => $getHistory->SoR_Id])->all();
					foreach ($SR as $key => $sr_value) {
						if ($sr_value->Service_Id == "SV3") {
							$service = Service::findone($sr_value->Service_Id);
							echo number_format("$service->Price");
						}		
					}
				}
			?>	
			</td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>7</td>
			<td>ค่าทำความสะอาด</td>
			<td>ครั้ง</td>
			<td></td>
			<td></td>
			<td>500</td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>8</td>
			<td>ค่าปรับ</td>
			<td>ครั้ง</td>
			<td></td>
			<td></td>
			<td></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>9</td>
			<td>ค่าประกัน</td>
			<td></td>
			<td></td>
			<td></td>
			<?php
				$month6 = $getMonth + 6;
				$value->StartDate = date('m');
				$startDate = $value->StartDate;
			?>
			<td>
				<?php 
					if ($startDate <= $month6||$getHistory->PaymentStatus==0) {
						$value->Deposit = 0;
						echo number_format("$value->Deposit");
					}
					else
					{
						echo "+ ".number_format("$value->Deposit");
					}
				 ?>
			</td>
			<td>บาท</td>
		</tr>

		<?php 
			$restore_Cost = $getHistory->TotalPrice + 500 - $value->Deposit;
		?>
		<tr>
			<td colspan="4"></td>
			<td>รวมเป็นเงิน</td>
			<td><?= number_format("$restore_Cost") ?></td>
			<td>บาท</td>
		</tr>
	</table>
	<h4><p>

	จำนวนเงินทั้งสิ้น <?= number_format("$restore_Cost")  ?> บาท <br></h4>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<h4>ลงชื่อ  ___________________________________  เจ้าหน้าที่</h4>
	</p>

	<p>
			<h4><u>หมายเหตุ </u>: หากเข้าพักไม่ถึง 6 เดือน นับจากวันที่เริ่มเช่า และผู้เช่าไม่ทำการชำระเงินค่าห้องพักภายใน 1 เดือน ผู้เช่าจะไม่ได้รับเงินประกันห้องคืน</h4>
	</p>
	</p>
<?php 
	if ($i == 1) { ?>
		<hr>
		<?php $i=2 ?>
	<?php } else { 
		$i=1;
	}
?>


<?php endforeach; ?>


