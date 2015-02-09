<?php
/* @var $this AllocationController */
/* @var $model Allocation */

$this->breadcrumbs=array(
	'Allocations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Allocation', 'url'=>array('index')),
	array('label'=>'Manage Allocation', 'url'=>array('admin')),
);
?>

<h1>Create Allocation</h1>

<?php $this->renderPartial('_form', 
	array('model'=>$model,
		  'academicTerm'=>$academicTerm,
		  'academicYear'=>$academicYear)); ?>