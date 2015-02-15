<?php
/* @var $this GradesController */
/* @var $model Grades */

/*$this->breadcrumbs=array(
	'Grades'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student'),'visible'=>Yii::app()->user->checkAccess('profile/admin')),
	array('label'=>'Coordinators','url'=>array('profile/admin','type'=>'Coordinator'),'visible'=>Yii::app()->user->checkAccess('profile/admin')),
	array('label'=>'Schools','url'=>array('school/admin'),'visible'=>Yii::app()->user->checkAccess('school/admin')),
	array('label'=>'Grades','url'=>array('grades/admin'),'active'=>true,'visible'=>Yii::app()->user->checkAccess('Coordinator')),
	array('label'=>'Sponsors','url'=>array('sponsor/admin'),'visible'=>Yii::app()->user->checkAccess('sponsor/admin')),
	);
if(Yii::app()->user->checkAccess('admin'))
  $this->report=array(
    array('label'=>'Allocations','url'=>array('profile/printIndex')),
    );
?>

<h1>Create Grades</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'academicYear'=>$academicYear,
			'academicTerm'=>$academicTerm)); ?>