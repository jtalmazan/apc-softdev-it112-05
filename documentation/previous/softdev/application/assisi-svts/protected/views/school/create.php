<?php
/* @var $this SchoolController */
/* @var $model School */

$this->breadcrumbs=array(
	'Schools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student')),
	array('label'=>'Coordinators','url'=>array('profile/admin','type'=>'Coordinator')),
	array('label'=>'Schools','url'=>array('school/admin'),'active'=>true),
	array('label'=>'Grades','url'=>array('grades/admin')),
	array('label'=>'Sponsors','url'=>array('sponsor/admin')),
	);

$this->report=array(
	array('label'=>'Allocations','url'=>array('profile/printIndex')),
	);
?>

<h1>Create School</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>