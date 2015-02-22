<?php
/* @var $this AllocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Allocations',
);

$this->menu=array(
	array('label'=>'Create Allocation', 'url'=>array('create')),
	array('label'=>'Manage Allocation', 'url'=>array('admin')),
);
?>

<h1>Allocations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
