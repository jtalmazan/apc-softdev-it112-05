<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
	'Applications'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Application', 'url'=>array('index')),
	array('label'=>'Create Application', 'url'=>array('create')),
	array('label'=>'Update Application', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Application', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Application', 'url'=>array('admin')),
);
?>

<h1>View Application #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'TypeOfApplication',
		'Course',
		'Duration',
		'SponsoredYears',
		'User_Id',
	),
)); ?>
