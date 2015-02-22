<?php
/* @var $this GradesController */
/* @var $data Grades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GPA')); ?>:</b>
	<?php echo CHtml::encode($data->GPA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Timeline_Id')); ?>:</b>
	<?php echo CHtml::encode($data->timeline->TermName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Application_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Application_Id); ?>
	<br />


</div>