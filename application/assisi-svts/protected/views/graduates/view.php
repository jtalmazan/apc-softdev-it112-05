<?php
/* @var $this GraduatesController */
/* @var $model Graduates */

$this->breadcrumbs=array(
	'Graduates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Graduates', 'url'=>array('index')),
	array('label'=>'Create Graduates', 'url'=>array('create')),
	array('label'=>'Update Graduates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Graduates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Graduates', 'url'=>array('admin')),
);
?>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>

<h1>View Graduates #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'name_of_school',
		'year_started_of_scholarship',
		'year_graduated',
		'course_title',
		'honors_recieved',
		'current_status',
		'current_employment',
	),
)); ?>
