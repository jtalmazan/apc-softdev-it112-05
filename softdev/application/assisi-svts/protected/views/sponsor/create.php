<?php
/* @var $this SponsorController */
/* @var $model Sponsor */

$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	'Create',
);

$this->menu=array(
  array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student')),
  array('label'=>'Coordinators','url'=>array('profile/admin','type'=>'Coordinator')),
  array('label'=>'Schools','url'=>array('school/admin')),
  array('label'=>'Grades','url'=>array('grades/admin')),
  array('label'=>'Sponsors','url'=>array('sponsor/admin'),'active'=>true),
  );

$this->report=array(
  array('label'=>'Allocations','url'=>array('profile/printIndex')),
  );
?>

<h1>Create Sponsor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>