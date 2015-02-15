<?php
/* @var $this TimelineController */
/* @var $model Timeline */

$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Timeline', 'url'=>array('index')),
	array('label'=>'Create Timeline', 'url'=>array('create')),
	array('label'=>'View Timeline', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Timeline', 'url'=>array('admin')),
);
?>

<h1>Update Timeline <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>