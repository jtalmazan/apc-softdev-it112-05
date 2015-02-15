<?php
/* @var $this AllocationController */
/* @var $data Allocation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TuitionFee')); ?>:</b>
	<?php echo CHtml::encode($data->TuitionFee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Miscellaneous')); ?>:</b>
	<?php echo CHtml::encode($data->Miscellaneous); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Others')); ?>:</b>
	<?php echo CHtml::encode($data->Others); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Timeline_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Timeline_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Application_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Application_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sponsor_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Sponsor_Id); ?>
	<br />


</div>