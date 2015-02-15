<?php
/* @var $this AllocationController */
/* @var $model Allocation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TuitionFee'); ?>
		<?php echo $form->textField($model,'TuitionFee',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Miscellaneous'); ?>
		<?php echo $form->textField($model,'Miscellaneous',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Others'); ?>
		<?php echo $form->textField($model,'Others',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Timeline_Id'); ?>
		<?php echo $form->textField($model,'Timeline_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Application_Id'); ?>
		<?php echo $form->textField($model,'Application_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sponsor_Id'); ?>
		<?php echo $form->textField($model,'Sponsor_Id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->