<?php
/* @var $this AllocationController */
/* @var $model Allocation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'allocation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	// 'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'action'=> Yii::app()->createUrl('/allocation/create'),
   	'clientOptions'=>array(
            'validateOnSubmit'=>true,
           /* 'afterValidate'=>'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"'.CHtml::normalizeUrl(array("allocation/create")).'",
                                        "data":form.serialize(),
                                        "success":function(data){$("#test").html(data);},
                                        });
                                }
                        }'*/
        ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model,$academicTerm,$academicYear)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TuitionFee'); ?>
		<?php echo $form->textField($model,'TuitionFee',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'TuitionFee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Miscellaneous'); ?>
		<?php echo $form->textField($model,'Miscellaneous',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'Miscellaneous'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Others'); ?>
		<?php echo $form->textField($model,'Others',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'Others'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Timeline_Id'); ?>
		<?php echo $form->dropDownList($academicTerm,'Id',$academicTerm->getAcademicTerms(),array('empty'=>' ','style'=>'width:100px;')); ?>
        <?php echo $form->textField($academicYear,'StartYear',array('size'=>4,'maxlength'=>4,'style'=>'width:100px;')); ?>
        <?php echo $form->textField($academicYear,'EndYear',array('size'=>4,'maxlength'=>4,'readonly'=>true,'style'=>'width:100px;')); ?>
        <?php echo $form->error($academicYear,'StartYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sponsor_Id'); ?>
		<?php echo $form->dropDownList($model,'Sponsor_Id',Sponsor::GetSponsors(),array('empty'=>'--Select sponsor--')); ?>
		<?php echo $form->error($model,'Sponsor_Id'); ?>
	</div>
	<?php echo $form->hiddenField($model, 'Application_Id');?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function () {
    $('#Academicyear_StartYear').change(function(){
        var startyear = $(this).val();
        $('#Academicyear_EndYear').val(parseInt(startyear)+1);
      });
    });
</script>