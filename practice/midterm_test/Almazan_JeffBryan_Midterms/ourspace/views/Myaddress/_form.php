<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\myaddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="myaddress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => 1]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'home_address')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'landline')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
