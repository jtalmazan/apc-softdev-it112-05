<?php
/* @var $this AnnouncementController */
/* @var $data Announcement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subject')); ?>:</b>
	<?php echo CHtml::encode($data->Subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message_box')); ?>:</b>
	<?php echo CHtml::encode($data->message_box); ?>
	<br />


</div>