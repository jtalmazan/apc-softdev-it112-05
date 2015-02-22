<?php
/* @var $this PartnerschoolController */
/* @var $model Partnerschool */

$this->breadcrumbs=array(
	'Partnerschools'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Partnerschool', 'url'=>array('index')),
	array('label'=>'Create Partnerschool', 'url'=>array('create')),
	array('label'=>'Update Partnerschool', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Partnerschool', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Partnerschool', 'url'=>array('admin')),
);
?>

<h1>View Partnerschool #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'School_Id',
		'User_Id',
	),
)); ?>
