<?php 

?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'print-form',
// Please note: When you enable ajax validation, make sure the corresponding
// controller action is handling ajax validation correctly.
// There is a call to performAjaxValidation() commented in generated controller code.
// See class documentation of CActiveForm for details on this.
		//'action'=>Yii::app()->createUrl('/profile/printIndex'),
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
		/*'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'afterValidate'=>'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"'.CHtml::normalizeUrl(array("profile/printIndex")).'",
                                        "data":form.serialize(),
                                        "success":function(data){$("#test").html(data);},
                                        });
                                }
                        }'
        ),*/
		'htmlOptions'=>array('target'=>'_blank')
		)); ?>

		<div class="row">
			<?php echo $form->labelEx($school,'Name'); ?>
			<?php echo $form->dropDownList($school,'Id',School::GetSchools(),array('empty'=>'--Select all school--')); ?>
			<?php echo $form->error($school,'Id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($academicYear,'StartYear'); ?>
			<?php echo $form->textField($academicYear,'StartYear'); ?>
			<?php echo $form->error($academicYear,'StartYear'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($academicYear,'EndYear'); ?>
			<?php echo $form->textField($academicYear,'EndYear'); ?>
			<?php echo $form->error($academicYear,'EndYear'); ?>
		</div>

		<div class="row">
			<?php
				$this->widget('bootstrap.widgets.TbButton', array(
					    'label'=>'Export PDF',
					    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					    'size'=>'large', // null, 'large', 'small' or 'mini'
					    'htmlOptions'=>array('id'=>'pdf'),
					)); 
			?>
			<?php 
				$this->widget('bootstrap.widgets.TbButton', array(
					    'label'=>'Export CSV',
					    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					    'size'=>'large', // null, 'large', 'small' or 'mini'
					    'htmlOptions'=>array('id'=>'csv'),
					)); 
			?>
		</div>


<?php $this->endWidget(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#pdf').attr('disabled',true);
		$('#csv').attr('disabled',true);
		$('#Academicyear_StartYear').blur(function(){
			checkIfValid();
		});
		$('#Academicyear_EndYear').blur(function(){
			checkIfValid();
		});

		$('#pdf').click(function(){
			var school = $('#School_Id').val();
			var start = $('#Academicyear_StartYear').val();
			var end = $('#Academicyear_EndYear').val();
			window.open("<?php echo Yii::app()->createUrl('profile/ExportPdf'); ?>"+"&school="+school+"&start="+start+"&end="+end, '_blank');
		});

		$('#csv').click(function(){
			var school = $('#School_Id').val();
			var start = $('#Academicyear_StartYear').val();
			var end = $('#Academicyear_EndYear').val();
			window.open("<?php echo Yii::app()->createUrl('profile/ExportCsv'); ?>"+"&school="+school+"&start="+start+"&end="+end, '_blank');
		});


		function checkIfValid()
		{
			if($('#Academicyear_StartYear').val() && $('#Academicyear_EndYear').val())
			{
				$('#pdf').removeAttr('disabled');
				$('#csv').removeAttr('disabled');
			}
				
		}
	});
</script>