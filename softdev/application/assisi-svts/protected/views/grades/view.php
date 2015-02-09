<?php
/* @var $this GradesController */
/* @var $model Grades */

$this->breadcrumbs=array(
	'Grades'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Grades', 'url'=>array('index')),
	array('label'=>'Create Grades', 'url'=>array('create')),
	array('label'=>'Update Grades', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Grades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Grades', 'url'=>array('admin')),
);
?>

<h1>View Grades #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'Id',
		array(
			'label'=>'Student',
			'value'=>$model->application->user->profile->Firstname." ".$model->application->user->profile->Middlename." ".$model->application->user->profile->Lastname,
		),
		array(
			'label'=>'Course',
			'value'=>$model->application->Course,
		),
		array(
			'label'=>'Timeline',
			'value'=>$model->timeline->Term." ".$model->timeline->DateStart."-".$model->timeline->DateEnd,
		),
		'GPA',
	),
)); ?>
