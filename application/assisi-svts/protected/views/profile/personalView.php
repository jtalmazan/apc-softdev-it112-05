<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'edit-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>true,
		)); ?>

		<?php echo $form->errorSummary($model,"Please fix the following input errors:","",array('class'=>'alert alert-error')); ?>

		<h2>General Account Settings</h2>

		<table class="table table-striped">
			
			<tr>
				<?php
					$this->widget('editable.EditableDetailView', array(
					'data'       => $model,
					//you can define any default params for child EditableFields 
					'url'        => $this->createUrl('profile/update'), //common submit url for all fields
					'params'     => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
					'emptytext'  => 'no value',
					//'apply' => false, //you can turn off applying editable to all attributes

					'attributes' => array(
					array(
					    'name' => 'Firstname',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',                
					        'validate'   => 'js:function(value) {
					            if(!value) return "Firstname is required";
					        }'
					    )
					),
					array(
					    'name' => 'Middlename',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',                
					    )
					),
					array(
					    'name' => 'Lastname',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',                
					        'validate'   => 'function(value) {
					            if(!value) return "Lastname is required"
					        }'
					    )
					),
					array(
					    'name' => 'Religion',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',           
					    )
					),
					array(
					    'name' => 'Sex',
					    'editable' => array(
					        'type'       => 'select',
					        'source'    => Editable::source(Profile::model()->getGenders()),
					        'placement' => 'right',           
					    )
					),
					array(
					    'name' => 'DateOfBirth',
					    'editable' => array(
					        'type'       => 'date',
					        'placement' => 'right',
					        'format'      => 'yyyy-mm-dd', //format in which date is expected from model and submitted to server
					        'viewformat'  => 'dd/mm/yyyy',          
					    )
					),
					array(
					    'name' => 'PlaceOfBirth',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',           
					    )
					),
					array(
					    'name' => 'Address',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',           
					    )
					),
					array(
					    'name' => 'ContactNumber',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',           
					    )
					),
					array(
					    'name' => 'Email',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',           
					    )
					),
					array(
					    'name' => 'Occupation',
					    'editable' => array(
					        'type'       => 'text',
					        'placement' => 'right',           
					    )
					), 
					array(
					    'name' => 'FuturePlan',
					    'editable' => array(
					        'type'       => 'textarea',
					        'placement' => 'right',           
					    )
					),     
					)
					));
				?>
			</tr>
		</table>	
	<?php $this->endWidget(); ?>
</div>