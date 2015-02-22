<?php
/* @var $this TimelineController */
/* @var $model Timeline */

$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Timeline', 'url'=>array('index')),
	array('label'=>'Create Timeline', 'url'=>array('create')),
	array('label'=>'Update Timeline', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Timeline', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Timeline', 'url'=>array('admin')),
);
?>

<h1>View Timeline #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Term',
		'DateStart',
		'DateEnd',
	),
)); ?>
