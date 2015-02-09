<?php
/* @var $this TimelineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Timelines',
);

$this->menu=array(
	array('label'=>'Create Timeline', 'url'=>array('create')),
	array('label'=>'Manage Timeline', 'url'=>array('admin')),
);
?>

<h1>Timelines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
