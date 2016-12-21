
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini skin-purple">
<?php $this->beginBody() ?>

<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
           
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Apartment</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2155.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Aom Waritsara</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">เมนูหลัก</li>

        


        <li class=" treeview">
          <a href="#">
            <i class="fa  fa-bed"></i> <span>การเข้าพัก</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-check-square"></i> การจองห้องพัก</a></li>
            <li ><a href="index2.html"><i class="fa fa-check-square"></i> การเช่าห้องพัก</a></li>
            <li ><a href="index2.html"><i class="fa fa-check-square"></i> การคืนห้องพัก</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="pages/widgets.html">
            <i class="fa  fa-user"></i>
            <span>ตรวจสอบผู้เข้าพัก</span>
         </a>
        </li>

        <li>
          <a href="pages/widgets.html">
            <i class="fa  fa-dashboard"></i> <span>บันทึกเลขมิเตอร์</span>
          </a>
        </li>

        
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-calculator "></i> <span>ใบแจ้งหนี้รายเดือน</span>
          </a>
        </li>

        <li>
          <a href="pages/widgets.html">
            <i class="fa  fa-file-o"></i> <span>ใบเสร็จชำระเงิน</span>
          </a>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa  fa-cogs"></i> <span>การจัดการพื้นฐาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= Url::to(['staff/index']) ?>"><i class="fa fa-check-square"></i> แก้ไขข้อมูลผู้ประกอบการ</a></li>
            <li ><a href="index2.html"><i class="fa fa-check-square"></i> ตั้งค่าอพาร์ตเมนต์</a></li>
            <li ><a href="index2.html"><i class="fa fa-check-square"></i> ตั้งค่าอัตราค่าใช้จ่าย</a></li>
          </ul>
        </li>

        <li>
          <a href="pages/widgets.html">
            <i class="fa   fa-building-o"></i> <span>ค่าใช้จ่ายกิจการ</span>
          </a>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>รายงานสรุป</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-check-square"></i> รายงานการเช่าห้องพัก</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-check-square"></i> รายงานการคืนห้องพัก</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-check-square"></i> รายงานการรับเงินเฉพาะค่าห้อง</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-check-square"></i> รายงานการรับเงินรวม</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-check-square"></i> รายงานรายรับ – รายจ่าย</a></li>
         </ul>
        </li>
        
        
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
   
    
   
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?> 

</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
