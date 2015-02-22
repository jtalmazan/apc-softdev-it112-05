<?php
/* @var $this SponsorController */
/* @var $model Sponsor */

$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sponsor', 'url'=>array('index')),
	array('label'=>'Create Sponsor', 'url'=>array('create')),
	array('label'=>'View Sponsor', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Sponsor', 'url'=>array('admin')),
);
?>

<h1>Update Sponsor <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>