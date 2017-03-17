
<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<!DOCTYPE html>

<html>
    <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
            dummydeclaration { padding-left: : : 4em; } /* Firefox ignores first declaration for some reason */
            tab1 { padding-left: 10em; }
            tab2 { padding-left: 2em; }

  </style>

    </head>
<h1>ใบสัญญาเช่าห้องพัก</h1>

<form align=center>
<div class="box box-success" align="center">
	<div class="box-header with-border">

      <p><h3>ใบลงทะเบียนผู้เข้าพัก</h3></p>
      <p><h5>Register Form</h5></p>
      <p align="center">ชื่อ<tab2><?= $detailrent["Cus_Id"]    ; ?></tab2><tab1>นามสกุล</tab1></p>
      <p align="center">บัตรประจำตัว/บัตรข้าราชการ/หนังสือเดินทางเลขที่<tab1>เบอร์โทรศัพท์</tab1><tab1>อีเมล์</tab1></</p>
      <p align="center">ที่อยู่ปัจุบัน/ที่อยู่ที่ทำงาน/สถานศึกษา (ถ้ามี)<tab1></tab1><tab1></tab1><tab1></tab1></p>
    
       <p></p>
       <p></p>
       <p>เข้าพักวันที่<tab1></tab1><tab1></tab1><tab1></tab1></p>
       <p></p>
       <p>กำหนดออก<tab1></tab1><tab1></tab1><tab1></tab1></p>

       <p align="right" >ลายมือชื่อ</p>
       <p align="right">-------------------------------</p>
       <p align="right">---/----/-------</p>


</div>
</form>

