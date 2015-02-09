<?php
/* @var $this PartnerschoolController */
/* @var $model Partnerschool */

$this->breadcrumbs=array(
	'Partnerschools'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Partnerschool', 'url'=>array('index')),
	array('label'=>'Create Partnerschool', 'url'=>array('create')),
	array('label'=>'View Partnerschool', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Partnerschool', 'url'=>array('admin')),
);
?>

<h1>Update Partnerschool <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>