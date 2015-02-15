<?php
/* @var $this PartnerschoolController */
/* @var $model Partnerschool */

$this->breadcrumbs=array(
	'Partnerschools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Partnerschool', 'url'=>array('index')),
	array('label'=>'Manage Partnerschool', 'url'=>array('admin')),
);
?>

<h1>Create Partnerschool</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>