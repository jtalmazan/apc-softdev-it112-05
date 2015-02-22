<?php
/* @var $this PartnerschoolController */
/* @var $model Partnerschool */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'School_Id'); ?>
		<?php echo $form->textField($model,'School_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'User_Id'); ?>
		<?php echo $form->textField($model,'User_Id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->