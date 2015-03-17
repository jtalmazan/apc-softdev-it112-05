<?php
/* @var $this GraduatesController */
/* @var $data Graduates */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_of_school')); ?>:</b>
	<?php echo CHtml::encode($data->name_of_school); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_started_of_scholarship')); ?>:</b>
	<?php echo CHtml::encode($data->year_started_of_scholarship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_graduated')); ?>:</b>
	<?php echo CHtml::encode($data->year_graduated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_title')); ?>:</b>
	<?php echo CHtml::encode($data->course_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('honors_recieved')); ?>:</b>
	<?php echo CHtml::encode($data->honors_recieved); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('current_status')); ?>:</b>
	<?php echo CHtml::encode($data->current_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_employment')); ?>:</b>
	<?php echo CHtml::encode($data->current_employment); ?>
	<br />

	*/ ?>

</div>