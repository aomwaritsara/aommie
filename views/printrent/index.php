<!DOCTYPE html>
<html>
<head>
  
</head>
<body>

<p ><h2 align="center">ใบลงทะเบียนผู้เข้าพัก</h2></p>
      <p><h4 align="center">Register Form</h4></p>
       <p></p>
         <p></p>
       <p></p>
         <p></p>
       <p></p>
  <table width="500" align="center" bgcolor="White" >
        
        <tr bgcolor="White">
            <td colspan="2" >ชื่อ <?= $model2->Fname?></td> <td>นามสกุล <?= $model2->Lname?></td>
                                 
        </tr>
        
     <tr>
     <td colspan="2">บัตรประจำตัว</td> <td><?= $model->Cus_Id?></td>
     </tr>

      <tr>
        <td colspan="2">เบอร์โทรศัพท์</td> <td><?= $model2->Tel?></td>
     </tr>

      <tr>
      <td colspan="2">อีเมล์ </td> <td><?= $model2->Email?></td>
     </tr>

      <tr>
        <td colspan="2">ที่อยู่ปัจุบัน/ที่อยู่ที่ทำงาน/สถานศึกษา (ถ้ามี)</td> <td> <?= $model2->Address?> </td>
     </tr>
      <tr>
      <td colspan="3"> </td> <td></td>
     </tr>
       <tr>
      <td colspan="3"> </td> <td></td>
     </tr>
    </table>


<!-- 
      <p align="Left"  colspan="3"><h3>ชื่อ <?= $model2->Fname?>  นามสกุล <?= $model2->Lname?></h3> </p> 
      <p align="Left">บัตรประจำตัว/บัตรข้าราชการ/หนังสือเดินทางเลขที่</p> 
      <p align="Left"> <?= $model->Cus_Id?> </p>
       <p align="Left"> เบอร์โทรศัพท์ <?= $model2->Tel?></p> 
       <p align="Left">อีเมล์ <?= $model2->Email?></p> 
      <p align="Left">ที่อยู่ปัจุบัน/ที่อยู่ที่ทำงาน/สถานศึกษา (ถ้ามี)</p>
          <p align="Left">   <?= $model2->Address?>   <p>  -->
       <p> <p>
       <p></p>
       <p></p>
       <p></p>
         <p></p>
       <p></p>
       <p></p>
         <p></p>
       <p>เข้าพักวันที่</p>
       <p> <?= $model->DateFrom?>  </p>
       <p>กำหนดออก</p>
       <p> __/__/____  </p>
<p></p>
         <p></p>
       <p>หมายเหตุ...................................................................................................................................................................................................................................................................
       ..................................................................................................................................................................................................................................................................................</p>
         <p></p>
       <p></p>
       <p></p>
         <p></p>
       <p></p>
         <p></p>
       <p></p>
         <p></p>
         <p></p>
       <p></p>
         <p></p>
       <p></p>
         <p></p>
         <p></p>
       <p></p>
         <p></p>
       <p></p>
       <p align="right" >ลายมือชื่อ</p>
       <p align="right">--------------------------------------------------------------------</p>
       <p align="right">------/------/-----------------</p>
       
 
</body>
</html>