<?php
/* @var $this SponsorController */
/* @var $model Sponsor */

$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	'Manage',
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
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sponsor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div>
	<div class="add-div">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			/*'type'=>'primary',*/
			'label'=>"Create",
			'icon' =>'icon-plus',
			'block'=>false,
			'url'=>$this->createUrl('sponsor/create'),
			));
			?>
	</div>
	<div class="search-form">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
</div>
<div class="clear"></div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'sponsor-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	'columns'=>array(
		'Name',
		'Address',
		'ContactNo',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
