<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
$type = Role::model()->findByPk($user->Role_Id)->Name;
?>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'profile-form',
// Please note: When you enable ajax validation, make sure the corresponding
// controller action is handling ajax validation correctly.
// There is a call to performAjaxValidation() commented in generated controller code.
// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>true,
		)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary(array($model,$partnerSchool,$application,$allocation,$academicTerm,$academicYear)); ?>

		<h3 class="header">Create new <?php echo Role::model()->findByPk($user->Role_Id)->Name ?><span class="header-line"></span></h3>
		<ul class="nav nav-tabs" id="tabs">
			<li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
			<li><a href="#application" data-toggle="tab" <?php echo $model->IsStudent($type) ? "" : "style='display:none;'"; ?>>Application</a></li>
			<li><a href="#allocation" data-toggle="tab"  <?php echo $model->IsStudent($type) ? "" : "style='display:none;'"; ?>>Allocation</a></li>
		</ul>
		<div class="tab-content">
			<!-- Profile Tab -->
			<div class="tab-pane active" id="profile">
				
				<div style="display: inline-flex;">
				<div class="row" <?php echo (SysTable::IsVisible('Lastname',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
					<?php echo $form->labelEx($model,'Lastname'); ?>
					<?php echo $form->textField($model,'Lastname',array('size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'Lastname'); ?>
				</div>
				<div class="row" <?php echo (SysTable::IsVisible('Firstname',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
					<?php echo $form->labelEx($model,'Firstname'); ?>
					<?php echo $form->textField($model,'Firstname',array('size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'Firstname'); ?>
				</div>
				<div class="row" <?php echo (SysTable::IsVisible('Middlename',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
					<?php echo $form->labelEx($model,'Middlename'); ?>
					<?php echo $form->textField($model,'Middlename',array('size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'Middlename'); ?>
				</div>
				</div>
				
				<div style="display: inline-flex;">
				<div class="row" <?php echo (SysTable::IsVisible('Sex',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
					<?php echo $form->labelEx($model,'Sex'); ?>
					<?php echo $form->dropDownList($model,'Sex',$model->getGenders(),array('empty'=>'Select a gender')); ?>
					<?php echo $form->error($model,'Sex'); ?>
				</div>
				<div class="row" <?php echo (SysTable::IsVisible('CivilStatus',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
					<?php echo $form->labelEx($model,'CivilStatus'); ?>
					<?php echo $form->dropDownList($model,'CivilStatus',$model->getCivilStatus(),array('empty'=>'Select a Civil Status')); ?>
					<?php echo $form->error($model,'CivilStatus'); ?>
				</div>
				<div class="row" <?php echo (SysTable::IsVisible('Religion',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
					<?php echo $form->labelEx($model,'Religion'); ?>
					<?php echo $form->textField($model,'Religion',array('size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'Religion'); ?>
				</div>
				</div>

				<div style="display: inline-flex;">
				<div class="row" <?php echo (SysTable::IsVisible('DateOfBirth',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
					<?php echo $form->labelEx($model,'DateOfBirth'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'name'=>'DateOfBirth',
    					// additional javascript options for the date picker plugin
						'options'=>array(
							'showAnim'=>'fold',
							 'changeMonth'=>true,
					        'changeYear'=>true,
					        'yearRange'=>'1980:2099',
					         'showOtherMonths'=>true,
					         'selectOtherMonths'=>true,
							),
						'htmlOptions'=>array(
							'style'=>'height:20px;'
							),
						));
						?>
						<?php echo $form->error($model,'DateOfBirth'); ?>
					</div>

					<div class="row" <?php echo (SysTable::IsVisible('PlaceOfBirth',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
						<?php echo $form->labelEx($model,'PlaceOfBirth'); ?>
						<?php echo $form->textField($model,'PlaceOfBirth',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'PlaceOfBirth'); ?>
					</div>

					<div class="row" <?php echo (SysTable::IsVisible('Address',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
						<?php echo $form->labelEx($model,'Address'); ?>
						<?php echo $form->textField($model,'Address',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'Address'); ?>
					</div>
					</div>

					<div style="display: inline-flex;">
					<div class="row" <?php echo (SysTable::IsVisible('ContactNumber',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
						<?php echo $form->labelEx($model,'ContactNumber'); ?>
						<?php echo $form->textField($model,'ContactNumber',array('size'=>15,'maxlength'=>15)); ?>
						<?php echo $form->error($model,'ContactNumber'); ?>
					</div>

					<div class="row" <?php echo (SysTable::IsVisible('Email',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
						<?php echo $form->labelEx($model,'Email'); ?>
						<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
						<?php echo $form->error($model,'Email'); ?>
					</div>
					</div>

					<div class="row" <?php echo (SysTable::IsVisible('FuturePlan',$user->Role_Id) ?  "" : "style='display:none;'"); ?>>
						<?php echo $form->labelEx($model,'FuturePlan'); ?>
						<?php echo $form->textArea($model,'FuturePlan',array('rows'=>6, 'cols'=>50)); ?>
						<?php echo $form->error($model,'FuturePlan'); ?>
					</div>

					<div class="row" <?php  echo $model->IsStudent($type) ? "style='display:none;'" : "" ;?>>
						<?php echo $form->labelEx($partnerSchool,'School_Id'); ?>
						<?php echo $form->dropDownList($partnerSchool,'School_Id',School::GetSchoolsNoCoordinator(),array('empty'=>'--Select a school partner--')); ?>
						<?php echo $form->error($partnerSchool,'School_Id'); ?>
					</div> 
				</div>
				
				<!-- Application tab -->
				<div class="tab-pane" id="application">
					<div class="row">
						<?php echo $form->labelEx($partnerSchool,'School_Id'); ?>
						<?php echo $model->IsStudent($type) ? 
						$form->dropDownList($partnerSchool,'School_Id',School::GetSchools(),array('empty'=>'--Select a school partner--')) : ""; ?>
						<?php echo $form->error($partnerSchool,'School_Id'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($application,'TypeOfApplication'); ?>
						<?php echo $form->dropDownList($application,'TypeOfApplication',array('College'=>'College','Vocational'=>'Vocational'),array('empty'=>'Select'));  ?>
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
				</div>

				<!-- Allocation Tab -->
				<div class="tab-pane" id="allocation">
					<div class="row">
						<?php echo $form->labelEx($allocation,'TuitionFee'); ?>
						<?php echo $form->textField($allocation,'TuitionFee',array('size'=>8,'maxlength'=>8)); ?>
						<?php echo $form->error($allocation,'TuitionFee'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($allocation,'Miscellaneous'); ?>
						<?php echo $form->textField($allocation,'Miscellaneous',array('size'=>8,'maxlength'=>8)); ?>
						<?php echo $form->error($allocation,'Miscellaneous'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($allocation,'Others'); ?>
						<?php echo $form->textField($allocation,'Others',array('size'=>8,'maxlength'=>8)); ?>
						<?php echo $form->error($allocation,'Others'); ?>
					</div>

					<div class="row">
						<?php echo CHtml::label('Timeline:',''); ?>
						<?php echo $form->dropDownList($academicTerm,'Id',$academicTerm->getAcademicTerms(),array('empty'=>' ','style'=>'width:100px;')); ?>
						<?php echo $form->textField($academicYear,'StartYear',array('size'=>4,'maxlength'=>4,'style'=>'width:100px;'));	?>
						<?php echo $form->textField($academicYear,'EndYear',array('size'=>4,'maxlength'=>4 ,'readonly'=>true,'style'=>'width:100px;')); ?>
						<?php echo $form->error($academicYear,'StartYear'); ?>
						<?php echo $form->error($academicTerm,'Id'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($allocation,'Sponsor_Id'); ?>
						<?php echo $form->dropDownList($allocation,'Sponsor_Id',Sponsor::GetSponsors(),array('empty'=>'Select a sponsor')); ?>
						<?php echo $form->error($allocation,'Sponsor_Id'); ?>
					</div>
				</div>

				<div class="btn-group">
					<button class="btn btn-mini btn-info float-left" id="prevtab" type="button">Prev</button>
					<button class="btn btn-mini btn-info float-right" id="nexttab" type="button">Next</button>
				</div>
			</div>
			
			<input type="hidden" class="role" value="<?php echo $type; ?>">
			<div class="row buttons" style="margin-top: 10px;">
				<?php /*$this->widget('bootstrap.widgets.TbButton', array(
					    'label'=>$model->isNewRecord ? 'Create' : 'Save',
					    'type'=>'primary',
					    'size'=>'normal', 
					));*/ ?>
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
			</div>
			<?php $this->endWidget(); ?>
			
		</div><!-- form -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.datepicker').datepicker();
				var tabs = $('#tabs li');
				var role = $('.role').val();
				if(role == "Student"){
					$('#prevtab').hide();
				}else{
					$('#prevtab').hide();
					$('#nexttab').hide();
				}
				var tabsize = tabs.size();


				$('#prevtab').on('click', function() {
					tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');
					checkVisible(tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').size(),'prev');
				});

				$('#nexttab').on('click', function() {
					tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
					checkVisible(tabs.filter('.active').next('li').find('a[data-toggle="tab"]').size(),'next');
				});

				function checkVisible(tabcount,direction){
					if(direction == 'next'){
						if(tabcount > 0){
							$('#prevtab').show();
						}else if(tabcount == 0){
							$('#nexttab').hide();
						}
					}else if(direction == 'prev'){
						if(tabcount > 0){
							$('#nexttab').show();
						}else if(tabcount == 0){
							$('#prevtab').hide();
						}
					}
				}

				// var durationTextField = $('#Application_Duration');
				// $('#Application_TypeOfApplication').change(function(){
				// 	if(this.value === "College"){
				// 		durationTextField.text("Adsa");
				// 		durationTextField.attr("placeholder", "In terms of year");
				// 	}else if(this.value === "Vocational"){
				// 		durationTextField.attr("placeholder", "In terms of month");
				// 	}else{
				// 		durationTextField.attr("placeholder", "");
				// 	}
				// });

				$('#Academicyear_StartYear').change(function(){
					var startyear = $(this).val();
					$('#Academicyear_EndYear').val(parseInt(startyear)+1);
				});
			});
</script>