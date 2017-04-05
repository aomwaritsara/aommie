
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

use yii\bootstrap\Dropdown;
use yii\web\Session;

$session = new Session;
$session->open();

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
<body class="sidebar-mini skin-blue">
<?php $this->beginBody() ?>



<header class="main-header">

    <!-- Logo -->
    <a href="<?= Url::to(['staff/index']) ?>" class="logo">
           
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
  <div class="wrapper">
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->


    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2155.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
         <?php if (isset($session['member_name'])) { ?>
          <p><?= $session['member_name']; ?></p>
      <a href="<?= Url::to(['site/profile'])?>"><i class="fa fa-circle text-primary">Profile</i> </a>
            <a href="<?= Url::to(['site/password'])?>"><i class="fa fa-circle text-warning">EditPassword</i> </a>
          <p><a href="<?= Url::to(['site/gologout'])?>"><i class="fa fa-circle text-danger">logout</i> </a></p>

         <?php }else{ ?>
            
          <a href="<?= Url::to(['/site/login'])?>">Login</a>
            
    <?php } ?>
        </div>
      </div>
      <li>
      </li>
      <li>
      </li>
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">เมนูหลัก</li>

          <li>
          <a href="<?= Url::to(['staff/index']) ?>">
            <i class="fa  fa-dashboard"></i> <span>จัดการสิทธิ์ผู้ประกอบการ</span>
          </a>
        </li>
<li class="treeview">
          <a href="<?= Url::to(['apartment/index']) ?>">
            <i class="fa  fa-user"></i>
            <span>ข้อมูลอพาร์ตเมนต์</span>
         </a>
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
</div>
<script type="text/javascript">
    $('.dropdown-toggle').dropdown();
</script>