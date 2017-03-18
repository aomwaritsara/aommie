<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            
            Yii::$app->user->isGuest ?
['label' => 'Sign in', 'url' => ['/user/security/login']] :
['label' => 'Account(' . Yii::$app->user->identity->username . ')', 'items'=>[
    ['label' => 'Profile', 'url' => ['/user/settings/profile']],
    ['label' => 'Account', 'url' => ['/user/settings/account']],
    ['label' => 'Logout', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
]],
['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
        ],
    ]);
    NavBar::end();
    ?>