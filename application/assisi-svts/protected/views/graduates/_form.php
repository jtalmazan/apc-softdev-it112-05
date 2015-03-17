<?php
/* @var $this GraduatesController */
/* @var $model Graduates */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'graduates-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_of_school'); ?>
		<?php echo $form->textField($model,'name_of_school',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name_of_school'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_started_of_scholarship'); ?>
		<?php echo $form->textField($model,'year_started_of_scholarship',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year_started_of_scholarship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_graduated'); ?>
		<?php echo $form->textField($model,'year_graduated',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year_graduated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_title'); ?>
		<?php echo $form->textField($model,'course_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'course_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'honors_recieved'); ?>
		<?php echo $form->textField($model,'honors_recieved',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'honors_recieved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_status'); ?>
		<?php echo $form->textField($model,'current_status',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'current_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_employment'); ?>
		<?php echo $form->textField($model,'current_employment',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'current_employment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->