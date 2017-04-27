<?php
use yii\helpers\Html;
use app\models\Customer;
use app\models\Roomtype;
use app\models\History;
use app\models\Service;
use app\models\Serviceofrental;

?>

<?php 
	$i=1;
?>

<?php foreach ($model as $key => $value) : ?>
	
	<?php 
		// $value = Customer::findone($value["Cus_Id"]);
		// $value = Roomtype::find()->where(['Room_Id' => $value["Room_Id"]])->one();
		// $value = History::find()->where(['Room_Id' => $value["Room_Id"], 'Cus_Id' => $value["Cus_Id"]])->one();
	?>

	<?php
		$value["CheckDate"] = date('m');
		$getMonth = $value["CheckDate"];
		$getMonth++;

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
		ใบวางบิล
		อินเตอร์เรสสิเด้นท์<br>
		ประจำเดือน <?= $month; ?>
	</h4>

	<p style="font-size: 14pt"> 
		เลขห้อง <?= $value["Room_Id"] ?>
		วันที่ <?= $date."/".$year ?> <br>
		ชื่อ <?= $value["Fname"]." ".$value["Lname"] ?> <br>
	</p>

	<table class="table" border="1" align="center" style="font-size: 12pt; text-align: center">
		<tr align="center">
			<th align="center">ลำดับ</th>
			<th align="center">รายการ</th>
			<th align="center">หน่วย</th>
			<th align="center">จำนวน</th>
			<th align="center">หน่วยละ</th>
			<th align="center">จำนวนเงิน</th>
			<th></th>
		</tr>
		<tr >
			<td>1</td>
			<td>ค่าเช่าห้อง</td>
			<td>บาท</td>
			<td></td>
			<td></td>
			<?php 
				$number_price = $value["Price"];
			?>
			<td><?= number_format($number_price); ?></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>2</td>
			<td>ค่าไฟฟ้า</td>
			<td>หน่วย</td>
			<?php 
				$nuew = $value["Elec_Used"] / $value["Eletricity"];
			?>
			<td><?= $nuew ?></td>
			<td><?= $value["Eletricity"] ?></td>
			<?php 
				$number_elec = $value["Elec_Used"];
			?>
			<td><?= number_format($number_elec) ?></td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>3</td>
			<td>ค่าน้ำ</td>
			<td>ห้อง</td>
			<td><?= $value["NumCus"]; ?></td>
			<td>100</td>
			<?php 
				$number_water = $value["Water_Used"];
			?>
			<td><?= number_format($number_water) ?></td>
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
				if ($value["SoR_Id"] != NULL) {
					$SR = Serviceofrental::find()->where(['SoR_Id' => $value["SoR_Id"]])->all();
					foreach ($SR as $key => $sr_value) {
						if ($sr_value["Service_Id"] == "SV1") {
							$service = Service::findone($sr_value["Service_Id"]);
							echo number_format($service->Price);
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
				if ($value["SoR_Id"] != NULL) {
					$SR = Serviceofrental::find()->where(['SoR_Id' => $value["SoR_Id"]])->all();
					foreach ($SR as $key => $sr_value) {
						if ($sr_value["Service_Id"] == "SV2") {
							$service = Service::findone($sr_value["Service_Id"]);
							echo number_format($service->Price);
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
				if ($value["SoR_Id"] != NULL) {
					$SR = Serviceofrental::find()->where(['SoR_Id' => $value["SoR_Id"]])->all();
					foreach ($SR as $key => $sr_value) {
						if ($sr_value["Service_Id"] == "SV3") {
							$service = Service::findone($sr_value["Service_Id"]);
							echo number_format($service->Price);
						}		
					}
				}
			?>	
			</td>
			<td>บาท</td>
		</tr>
		<tr>
			<td>7</td>
			<td>ค่าปรับ</td>
			<td>ครั้ง</td>
			<td></td>
			<td></td>
			<td></td>
			<td>บาท</td>
		</tr>

		<tr>
			<td colspan="4"></td>
			<td>รวมเป็นเงิน</td>
			<?php 
				$number_total = $value["TotalPrice"];
			?>
			<td><?= number_format($number_total)?></td>
			<td>บาท</td>
		</tr>
	</table>


	กรุณาชำระค่าบริการโดยการโอนเงินเข้าบัญชีธนาคารเท่านั้น (งดรับเงินสดทุกกรณี)<br>
	<!-- กรุณาชำระค่าบริการให้ตรงตามยอดในใบวางบิลเพื่อป้องกันความผิดพลาด <br> -->	
	หากโอนแล้วเงินแล้ว ให้นำสลิปใบโอนเงินมาขอรับใบเสร็จได้ที่เค้าเตอร์ <!-- <br>
	กรณีโอนเงิแล้วแต่ไม่มีหลักฐานการโอน  -->กรุณาแจ้งยืนยันการโอนได้ที่ฝ่ายบัญชีเบอร์ 083-9594004 <br>
	บัญชีนางอารยา ศิรินิรันดร์ ประเภทออมทรัพย์ :
				<b>
				ธนาคารกสิกรไทย สาขาบิ๊กซี หางดง 548-2-233389-0 <br>
				ธนาคารกรุงเทพ สาขาถนนช้างคลาน 505-7-04414-0 <br>
				ธนาคารไทยพาณิชย์ สาขาบิ๊กซี หางดง 402-6-08156-7 <br>
				ธนาคารกรุงไทย สาขาบิ๊กซี หางดง 787-0-10469-8
				</b>
<?php 
	if ($i == 1) { ?>
		<hr>
		<?php $i=2 ?>
	<?php } else { 
		$i=1;
	}
?>


<?php endforeach; ?>


