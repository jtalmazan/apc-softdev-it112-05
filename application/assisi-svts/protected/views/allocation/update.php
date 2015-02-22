<?php
/* @var $this AllocationController */
/* @var $model Allocation */

$this->breadcrumbs=array(
	'Allocations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Allocation', 'url'=>array('index')),
	array('label'=>'Create Allocation', 'url'=>array('create')),
	array('label'=>'View Allocation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Allocation', 'url'=>array('admin')),
);
?>

<h1>Update Allocation <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>