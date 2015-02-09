<?php
/* @var $this TimelineController */
/* @var $data Timeline */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Term')); ?>:</b>
	<?php echo CHtml::encode($data->Term); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateStart')); ?>:</b>
	<?php echo CHtml::encode($data->DateStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateEnd')); ?>:</b>
	<?php echo CHtml::encode($data->DateEnd); ?>
	<br />


</div>