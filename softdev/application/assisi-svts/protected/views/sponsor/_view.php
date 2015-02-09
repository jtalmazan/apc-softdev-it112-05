<?php
/* @var $this SponsorController */
/* @var $data Sponsor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ContactNo')); ?>:</b>
	<?php echo CHtml::encode($data->ContactNo); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('SponsorCoordinator')); ?>:</b>
	<?php echo CHtml::encode($data->SponsorCoordinator); ?>
	<br />

</div>