<?php
/* @var $this TimelineController */
/* @var $model Timeline */
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
		<?php echo $form->label($model,'Term'); ?>
		<?php echo $form->textField($model,'Term',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateStart'); ?>
		<?php echo $form->textField($model,'DateStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateEnd'); ?>
		<?php echo $form->textField($model,'DateEnd'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->