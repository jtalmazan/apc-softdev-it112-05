<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);
$type = Role::model()->findByPk($user->Role_Id)->Name;
$this->menu=array(
	array('label'=>'View '.$type, 'url'=>array('admin','type'=>$type), 'active'=>Yii::app()->controller->action->id === 'admin'),
	array('label'=>'Create '.$type, 'url'=>array('create', 'type'=>$type), 'active'=>Yii::app()->controller->action->id === 'create'),
	);

?>

<h1>Update Profile <?php echo $model->getFullname(); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'user'=>$user,
	'partnerSchool'=>$partnerSchool,
	'application'=>$application,
	'allocation'=>$allocation
	)); ?>