<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;


AppAsset::register($this);
?>

<?php   $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini skin-blue"  >
<?php $this->beginBody() ?>
<?php

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login" align="center" >
<h2><marquee>ระบบการบริหารจัดการอพาร์ตเมนต์ </marquee></h2>
<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> 
    <h1><?= Html::encode($this->title) ?></h1>

        <p>กรุณากรอกข้อมูลสำหรับเข้าสู่ระบบ</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class='col-lg-3'>{input}</div>\n<div class='col-lg-3'>{error}</div>",
                'labelOptions' => ['class' => 'col-lg-5 control-label'],
            ],
        ]); ?>
   
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-5 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-2\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-4 col-lg-5">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
</div>
</div>
</div>
</body>

 
   
    
   
     <!--    <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

        ]) ?> -->
       
</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
</div>