<?php
/* @var $this SchoolController */
/* @var $model School */

$this->breadcrumbs=array(
	'Schools'=>array('index'),
	'Manage',
	);

$this->menu=array(
	array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student')),

	array('label'=>'Schools','url'=>array('school/admin'),'active'=>true),
	array('label'=>'Grades','url'=>array('grades/admin')),
	array('label'=>'Sponsors','url'=>array('sponsor/admin')),
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
	$('#school-grid').yiiGridView('update', {
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
			'url'=>$this->createUrl('school/create'),
			));
			?>
		</div>
		<div class="search-form">
			<?php $this->renderPartial('_search',array(
				'model'=>$model,
				)); ?>
			</div>	
		</div>
		<!-- search-form -->
		<div class="clear"></div>
		<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'school-grid',
			'dataProvider'=>$model->search(),
			/*'filter'=>$model,*/
			'columns'=>array(
		// 'Id',
				'Name',
				'Address',
				'ContactNo',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{update},{delete}',
					),
				),
				)); ?>
