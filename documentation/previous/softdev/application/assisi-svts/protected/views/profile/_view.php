<?php
/* @var $this ProfileController */
/* @var $data Profile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Lastname')); ?>:</b>
	<?php echo CHtml::encode($data->Lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Firstname')); ?>:</b>
	<?php echo CHtml::encode($data->Firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Middlename')); ?>:</b>
	<?php echo CHtml::encode($data->Middlename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Religion')); ?>:</b>
	<?php echo CHtml::encode($data->Religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sex')); ?>:</b>
	<?php echo CHtml::encode($data->Sex); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('DateOfBirth')); ?>:</b>
	<?php echo CHtml::encode($data->DateOfBirth); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PlaceOfBirth')); ?>:</b>
	<?php echo CHtml::encode($data->PlaceOfBirth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ContactNumber')); ?>:</b>
	<?php echo CHtml::encode($data->ContactNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FuturePlan')); ?>:</b>
	<?php echo CHtml::encode($data->FuturePlan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->DateCreated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->DateUpdate); ?>
	<br />

	*/ ?>

</div>