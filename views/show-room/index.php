<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<div class="box box-success">
	<div class="box-header with-border">
        <h2>Room</h2> สถานะห้อง : &nbsp<div class="ic" style="background-color:#87FF8D;">&nbsp &nbsp &nbsp &nbsp</div>  ว่าง &nbsp &nbsp
        	<div class="ic" style='background-color:#FF6961'>&nbsp &nbsp &nbsp &nbsp</div> ถูกเช่า  &nbsp &nbsp
        	<div class="ic" style='background-color:#CCAACC'>&nbsp &nbsp &nbsp &nbsp</div> ถูกจอง &nbsp &nbsp
        	<div class="ic" style='background-color:#FDFD96'>&nbsp &nbsp &nbsp &nbsp</div> ไม่พร้อม &nbsp &nbsp
        	<div class="box-tools pull-right" ></div>
    </div>
	
	<?php foreach ($numFloor as $floor): ?>
		<div class="row" style="padding : 0px 30px 0px 30px">
		<?php echo "<h2> Floor ".$floor->Floor."</h2> "; ?>
		  <?php foreach ($rooms as $room): ?>
		  	 <?php if ($room->Floor == $floor->Floor): ?>
		  	 	<?php if($room->Status == 1):
		  	 			$Status_detail = "ว่าง";
		  	 			$color_style = "style='background-color:#87FF8D';" ;
		  	 		  elseif ($room->Status == 2):
		  	 		  	$Status_detail = "ถูกเช่า";
		  	 		    $color_style = "style='background-color:#FF6961';" ;
		  	 		  elseif ($room->Status == 3):
		  	 		  	$Status_detail = "ถูกจอง";
		  	 		    $color_style = "style='background-color:#CCAACC';" ;
		  	 		  else :
		  	 		  	$Status_detail = "ไม่พร้อม";
		  	 		    $color_style = "style='background-color:#FDFD96';" ;
		  	 		 endif;   ?>
		     <div class="col-xs-6 col-sm-4 col-md-2">
	        	<div class="borderRoom" <?= $color_style ?> >
	                 <p class="h4" align="center"><?= $room->Room_Id ?> </p>
	                 <p class="h4" align="center"><?= $Status_detail ?> </p>
	                 <button type="button" class="btn btn-info btn-responsive btn-xs center-block" data-toggle="modal" data-target="#myModal">Detail</button>
	            </div>
	       	</div>    
		     <?php   endif;   ?>
	        
	    <?php endforeach; ?>
	 	</div>
   	 <?php endforeach; //end for floor?> 


</div>






<!-- Modal input eieieieieiei -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content input details-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ห้องที่ test</h4>
      </div>
      <div class="modal-body">
        <p>ห้อง &nbsp A324</p> 
        <p>ชื่อ ทดสอบ โชว์รายละเอียด</p>
        <p>วันที่ 12/1/2560 </p>
        <p>สถานะห้อง ว่าง/จอง/เช่า/คืนห้อง</p>
        <p>ประเภทห้อง ทั่วไป/ร้านค้า </p>
       	<p>เงินประกัน 2700 บาท </p>
       <p>	<button>จอง</button>	 <button>เช่า</button> <button>คืนห้องพัก</button> </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
