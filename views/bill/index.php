<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<h4>ใบเสร็จชำระเงิน</h4>
<form >
<div class="box box-success" >
	
	<div class="box-header with-border">

 <table align=center border="1" width="800">
        
        <tr bgcolor="red" >
            <td  >ห้อง </td> <td>ชื่อ</td><td>ราคา</td><td>สถานะการจ่ายเงิน</td> 
                                 
        </tr>
        
     <tr>
	<td>A211</td> <td>a b</td><td>3500</td><td><input type="checkbox" value="Red">จ่ายแล้ว <input type="checkbox" value="Red">ค้างจ่าย<br></td> 
	  </tr>

	  <tr>
	  <td>A212</td> <td>c d</td><td>3900</td><td><input type="checkbox" value="Red">จ่ายแล้ว<input type="checkbox" value="Red">ค้างจ่าย<br></td> 
	  </tr>

	  <tr>
	  <td>A213</td> <td>e f</td><td>3800</td><td><input type="checkbox" value="Red">จ่ายแล้ว<input type="checkbox" value="Red">ค้างจ่าย<br></td> 
	  </tr>

  	<tr>
  	<td>A214</td> <td>h i</td><td>3780</td><td><input type="checkbox" value="Red">จ่ายแล้ว<input type="checkbox" value="Red">ค้างจ่าย<br></td> 
	  </tr>

	  <tr>
	  <td>A215</td> <td>j k</td><td>3550</td><td><input type="checkbox" value="Red">จ่ายแล้ว<input type="checkbox" value="Red">ค้างจ่าย<br></td> 
	  </tr>

</table>
</div>
</div>

</form>
<a href="<?= Url::to(['printbill/index']) ?>"> <div align="right" ><button>พิมใบเสร็จชำระเงิน</button></div>