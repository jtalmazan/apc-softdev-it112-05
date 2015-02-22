<?php
/* @var $this ApplicationController */
/* @var $model Application */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'application-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($application,'TypeOfApplication'); ?>
		<?php echo $form->textField($application,'TypeOfApplication',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($application,'TypeOfApplication'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($application,'Course'); ?>
		<?php echo $form->textField($application,'Course',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($application,'Course'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($application,'Duration'); ?>
		<?php echo $form->textField($application,'Duration',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($application,'Duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SponsoredYears'); ?>
		<?php echo $form->textField($model,'SponsoredYears'); ?>
		<?php echo $form->error($model,'SponsoredYears'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'User_Id'); ?>
		<?php echo $form->textField($model,'User_Id'); ?>
		<?php echo $form->error($model,'User_Id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->