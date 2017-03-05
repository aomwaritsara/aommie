<?php
use app\models\Roomtype;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<?php 
  //echo print_r($james);

   //  foreach ($detail as $key => $value) {
   //    echo "<br>".$value["Name"];
   // }
?>

<div class="box box-success">
    <div class="box-header with-border">
        <h2>ห้องพัก</h2> สถานะห้อง : &nbsp;<div class="ic" style="background-color:#87FF8D;">&nbsp; &nbsp; &nbsp; &nbsp;</div>  ว่าง &nbsp; &nbsp;
            <div class="ic" style='background-color:#FF6961'>&nbsp; &nbsp; &nbsp; &nbsp;</div> ถูกเช่า  &nbsp; &nbsp;
            <div class="ic" style='background-color:#CCAACC'>&nbsp; &nbsp; &nbsp; &nbsp;</div> ถูกจอง &nbsp; &nbsp;
            <div class="ic" style='background-color:#FDFD96'>&nbsp; &nbsp; &nbsp; &nbsp;</div> ไม่พร้อม &nbsp; &nbsp;
            <div class="box-tools pull-right" ></div>
    </div>
    

    <?php foreach ($numFloor as $floor): ?>
        <div class="row" style="padding : 0px 30px 0px 30px">
        <?php echo "<h2>ชั้น ".$floor->Floor."</h2> "; ?>
          <?php foreach ($detail as $room):  ?>
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
             <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="borderRoom" <?= $color_style ?> >
                     <p class="h4" align="center"><?= $room["Room_Id"] ?> </p>
                     <p class="h4" align="center"><?= $Status_detail ?> </p>

                     <button type="button" class="btn btn-info btn-responsive btn-xs center-block" data-backdrop="static" data-toggle="modal" data-target='#myModal<?php echo $room["Room_Id"];?>'>รายละเอียด</button>
                </div>
              <!--  <?php //  endif;   ?>-->
              <!--  <?php //endforeach; ?>-->
              </div>


<div id="myModal<?php echo $room["Room_Id"];?>" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

                                    <!-- Modal content input details -->
                                    <div class="modal-content">

                                      <div class="modal-header">
                                      
                                            
                                        <button type="button" class="close" data-dismiss="modal">&times;
                                        </button>
                                        <h4 class="modal-title">ห้อง<?= $room["Room_Id"] ; ?></h4>
                                      </div>
                                  <div class="modal-body">

                                        <p>ชื่อห้อง :<?= $room["Name"]    ; ?> </p> 
                                        <p>ชั้น   :<?= $room["Floor"]   ; ?> </p> 
                                        <p>สถานะห้อง :<?= $room["Status"]; ?> </p> 
                                        <p>ประเภทห้อง :<?= $room["Type"]; ?> </p> 
                                        <p>ราคา <?= $room["Price"]    ; ?> </p> 
                                        <!-- <p>ผู้จอง/ผู้เช่า <?//= "Cusname"    ; ?> </p> --> 
                                        <!-- <p>จำนวนผู้เข้าพัก <?//= "CusNumber"    ; ?> </p> --> 
                                        <!-- <p>เงินประกันห้อง <?//= "Money"   ; ?> </p>  -->

                            
                                      
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                 
                                    
                                  </div>

                                </div>
        <?php   endif;   ?>                     
        <?php endforeach; ?>
        </div>
     <?php endforeach; //end for floor?> 

     

</div>





  
