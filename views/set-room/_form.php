<?php
use app\models\Roomtype;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SetRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model1, 'Apart_Id')->textInput() ?>

    <?= $form->field($model1, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model1, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model1, 'Floor')->textInput() ?>

    <?= $form->field($model1, 'Status')->textInput(['maxlength' => true]) ?>



  <?= $form->field($model2, 'Apart_Id')->textInput() ?>

    <?= $form->field($model2, 'Room_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'Type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'Price')->textInput() ?>

    <?= $form->field($model2, 'Eletricity')->textInput() ?>

    <?= $form->field($model2, 'Watersupply')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model1->isNewRecord ? 'Create' : 'Update', ['class' => $model1->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
