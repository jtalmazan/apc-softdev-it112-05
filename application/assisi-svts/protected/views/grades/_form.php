<?php
/* @var $this GradesController */
/* @var $model Grades */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grades-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'GPA'); ?>
		<?php echo $form->textField($model,'GPA',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'GPA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Timeline_Id'); ?>
		<?php echo $form->dropDownList($academicTerm,'Id',$academicTerm->getAcademicTerms(),array('empty'=>' ','style'=>'witdh:100px;')); ?>
		<?php echo $form->textField($academicYear,'StartYear',array('size'=>4,'maxlength'=>4));	?>
		<?php echo $form->textField($academicYear,'EndYear',array('size'=>4,'maxlength'=>4 ,'readonly'=>true)); ?>
		<?php echo $form->error($model,'Timeline_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Application_Id'); ?>
		<?php echo $form->dropDownList($model,'Application_Id',Application::GetStudentBySchoolId(Yii::app()->session['SchoolId']),array('empty'=>'Select Student')); ?>
		<?php echo $form->error($model,'Application_Id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#Academicyear_StartYear').change(function(){
			var startyear = $(this).val();
			$('#Academicyear_EndYear').val(parseInt(startyear)+1);
		});	
	});
</script>