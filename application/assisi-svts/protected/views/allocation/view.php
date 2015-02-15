<?php
/* @var $this AllocationController */
/* @var $model Allocation */

$this->breadcrumbs=array(
	'Allocations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Allocation', 'url'=>array('index')),
	array('label'=>'Create Allocation', 'url'=>array('create')),
	array('label'=>'Update Allocation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Allocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Allocation', 'url'=>array('admin')),
);
?>

<h1>View Allocation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'TuitionFee',
		'Miscellaneous',
		'Others',
		'Timeline_Id',
		'Application_Id',
		'Sponsor_Id',
	),
)); ?>
