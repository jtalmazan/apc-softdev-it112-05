<?php
/* @var $this PartnerschoolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Partnerschools',
);

$this->menu=array(
	array('label'=>'Create Partnerschool', 'url'=>array('create')),
	array('label'=>'Manage Partnerschool', 'url'=>array('admin')),
);
?>

<h1>Partnerschools</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
