<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
       ไม่พบข้อมูล กรุณาเพิ่มข้อมูลการออกใบวางบิล
    </p>
   <p align="left"><a href="<?= Url::to(['payment/index']) ?>"<button class="btn">กลับ</button></a></p>

</div>
<!--  The above error occurred while the Web server was processing your request.
Please contact us if you think this is a server error. Thank you. -->