<?php
/* @var $this PartnerschoolController */
/* @var $data Partnerschool */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('School_Id')); ?>:</b>
	<?php echo CHtml::encode($data->School_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_Id')); ?>:</b>
	<?php echo CHtml::encode($data->User_Id); ?>
	<br />


</div>