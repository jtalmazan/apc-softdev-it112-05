<?php
/* @var $this GraduatesController */
/* @var $model Graduates */

$this->breadcrumbs=array(
	'Graduates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Graduates', 'url'=>array('index')),
	array('label'=>'Manage Graduates', 'url'=>array('admin')),
);
?>

<h1>Create Graduates</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>