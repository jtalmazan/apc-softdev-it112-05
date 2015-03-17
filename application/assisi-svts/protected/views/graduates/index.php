<?php
/* @var $this GraduatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Graduates',
);

$this->menu=array(
	array('label'=>'Create Graduates', 'url'=>array('create')),
	array('label'=>'Manage Graduates', 'url'=>array('admin')),
);
?>

<h1>Graduates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
