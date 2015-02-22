<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
  array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student'),'active'=>($_GET['type']==='Student')),
  array('label'=>'Coordinators','url'=>array('profile/admin','type'=>'Coordinator'),'active'=>($_GET['type']==='Coordinator')),
  array('label'=>'Schools','url'=>array('school/admin')),
  array('label'=>'Grades','url'=>array('grades/admin')),
  array('label'=>'Sponsors','url'=>array('sponsor/admin')),
  );

if(Yii::app()->user->checkAccess('profile/admin'))
  $this->report=array(
    array('label'=>'Allocations','url'=>array('profile/printIndex')),
    );

?>
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'user'=>$user,
	'partnerSchool'=>$partnerSchool,
	'application'=>$application,
	'allocation'=>$allocation,
	'academicTerm'=>$academicTerm,
	'academicYear'=>$academicYear	
	)); ?>