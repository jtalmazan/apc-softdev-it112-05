<?php
/* @var $this GraduatesController */
/* @var $model Graduates */

$this->breadcrumbs=array(
	'Graduates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Graduates', 'url'=>array('index')),
	array('label'=>'Create Graduates', 'url'=>array('create')),
	array('label'=>'View Graduates', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Graduates', 'url'=>array('admin')),
);
?>

<h1>Update Graduates <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>