<?php
use app\models\Roomtype;
use yii\helpers\Html;
use yii\widgets\LinkPager;


use yii\web\Session;

$session = new Session;
$session->open();

use app\models\Room;
use app\models;


?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="box box-success">

	<div class="box-header with-border">
        <h2>ห้องพัก</h2> สถานะห้อง : &nbsp<div class="ic" style="background-color:#87FF8D;">&nbsp &nbsp &nbsp &nbsp</div>  ว่าง &nbsp &nbsp
        	<div class="ic" style='background-color:#FF6961'>&nbsp &nbsp &nbsp &nbsp</div> ถูกเช่า  &nbsp &nbsp
        	<div class="ic" style='background-color:#CCAACC'>&nbsp &nbsp &nbsp &nbsp</div> ถูกจอง &nbsp &nbsp
        	<div class="ic" style='background-color:#FDFD96'>&nbsp &nbsp &nbsp &nbsp</div> ไม่พร้อม &nbsp &nbsp
        	<div class="box-tools pull-right" ></div>
    </div>
	
    <?php 
    	$roomModal     = "-";
    	$cusNameModal  = "-";
    	$DateModal     = "-";
    	$StatusModal   = "-";
    	$roomTypeModal = "-";
    	$depositModal  = "-";
    	$roomModal     = "-";

    ?>

	<?php foreach ($numFloor as $floor): ?>
		<div class="row" style="padding : 0px 30px 0px 30px">
		<?php echo "<h2> ชั้น ".$floor->Floor."</h2> "; ?>
			 <?php $c = 0; ?>
		  <?php foreach ($rooms as $room):  ?>
		  	 <?php $c++; ?>


		  	 <?php if ($room["Floor"] == $floor->Floor): ?>
		  	 	<?php if($room["Status"] == 1):
		  	 			$Status_detail = "ว่าง";
		  	 			$color_style = "style='background-color:#87FF8D';" ;
		  	 		  elseif ($room["Status"] == 2):
		  	 		  	$Status_detail = "ถูกเช่า";
		  	 		    $color_style = "style='background-color:#FF6961';" ;
		  	 		  elseif ($room["Status"] == 3):
		  	 		  	$Status_detail = "ถูกจอง";
		  	 		    $color_style = "style='background-color:#CCAACC';" ;
		  	 		  else :
		  	 		  	$Status_detail = "ไม่พร้อม";
		  	 		    $color_style = "style='background-color:#FDFD96';" ;
		  	 		 endif;   ?>
							<div class="col-xs-8 col-sm-4 col-md-2 col-lg-1">
									<div class="borderRoom" <?= $color_style ?> >

										<p class="hna" align="center"><?= $room["Room_Id"] ?> </p>
										<p class="hna" align="center"><?= $Status_detail ?> </p>
										<?php 
											  if($room['Status'] == 3){
											  		$Deposit = $room['DepositBooking'];
											  		$room['Fname'] = $deposits[$c -1]["Fname"];
											  		$room['Lname'] = $deposits[$c -1]["Lname"];
											  }
											  else
											  		$Deposit = $room['Deposit'];

										?>
										
										<button type="button" class="eiei btn btn-info btn-responsive btn-xs center-block open-AddBookDialog" 
												data-id="<?= $room['Room_Id'] ?>"
												data-rname = "<?= $room['Name'] ?>"
												data-floor = "<?= $room['Floor'] ?>"
												data-stat = "<?= $Status_detail ?>"
												data-rtype = "<?= $room['Type'] ?>"
												data-price = "<?= $room['Price'] ?>"
												data-cname = "<?= $room['Fname'] . ' ' .$room['Lname']  ?>"
												data-numcus = "<?= $room['NumCus'] ?>"
												data-depos = "<?= $Deposit ?>"
												
												data-toggle="modal" data-target="#myModal">Detail</button>
									</div>
							</div>
	       <?php   endif;   ?>	

	      	
	    <?php endforeach; ?>							 
	       	   </div>  <!--end Row -->
		 
	 <?php endforeach; //end for floor?> 



<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">


                                    <!-- Modal content input details -->
                                    <div class="modal-content">

                                      <div class="modal-header">
                                      
                                            
                                        <button type="button" class="close" data-dismiss="modal">&times;
                                        </button>
                                        <h4 class="modal-title">ห้อง 
										 <span id="roomId"> - </span>
											</h4>
                                      </div>
                                  <div class="modal-body">

                                      <h5>ชื่อห้อง : <span id="roomName">-</span></h5>
									 <h5>ชั้น : <span id="roomFloor">-</span></h5>
									<h5>สถานะ : <span id="roomStatus">-</span></h5>
									<h5>ประเภทห้อง A=ทั่วไป B=ร้านค้า : <span id="roomType">-</span></h5>
									<h5>ราคา : <span id="Price">-</span></h5>
									<h5>ชื่อผู้เข้าพัก : <span id="CName">-</span></h5>
								<h5>จำนวนผู้เข้าพัก : <span id="Number">-</span></h5>					
									<h5>เงินประกัน : <span id="Deposit">-</span></h5>								

                          </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       </div>
                      </div>
                             
                                    
  </div>


</div>

<script>
$(document).on("click", ".open-AddBookDialog", function () {
      var _roomId = $(this).data('id');
			var _roomName = $(this).data('rname');
			var _roomFloor = $(this).data('floor');
			var _status = $(this).data('stat');
			var _type = $(this).data('rtype');
			var _price = $(this).data('price');
			var _cName = $(this).data('cname');
			var _numC = $(this).data('numcus');
			var _depo = $(this).data('depos');
			
		// alert('eieiei');
      $(".modal-title #roomId").text(_roomId);
			$(".modal-body #roomName").text(_roomName);
			$(".modal-body #roomFloor").text(_roomFloor);
			$(".modal-body #roomStatus").text(_status);
			$(".modal-body #roomType").text(_type);
			$(".modal-body #Price").text(_price);
			$(".modal-body #CName").text(_cName);
			$(".modal-body #Number").text(_numC);
			$(".modal-body #Deposit").text(_depo);
			
			
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>

