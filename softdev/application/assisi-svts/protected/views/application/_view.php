<?php
/* @var $this ApplicationController */
/* @var $data Application */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TypeOfApplication')); ?>:</b>
	<?php echo CHtml::encode($data->TypeOfApplication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Course')); ?>:</b>
	<?php echo CHtml::encode($data->Course); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SponsoredYears')); ?>:</b>
	<?php echo CHtml::encode($data->SponsoredYears); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Id')); ?>:</b>
	<?php echo CHtml::encode($data->User_Id); ?>
	<br />


</div>