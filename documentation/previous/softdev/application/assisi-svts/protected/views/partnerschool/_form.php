<?php
/* @var $this PartnerschoolController */
/* @var $model Partnerschool */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'partnerschool-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($partnerSchool,'School_Id'); ?>
		<?php echo $form->textField($partnerSchool,'School_Id'); ?>
		<?php echo $form->error($partnerSchool,'School_Id'); ?>
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