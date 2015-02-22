<?php
/* @var $this GradesController */
/* @var $model Grades */

$this->breadcrumbs=array(
	'Grades'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student'),'visible'=>Yii::app()->user->checkAccess('profile/admin')),
	array('label'=>'Coordinators','url'=>array('profile/admin','type'=>'Coordinator'),'visible'=>Yii::app()->user->checkAccess('profile/admin')),
	array('label'=>'Schools','url'=>array('school/admin'),'visible'=>Yii::app()->user->checkAccess('school/admin')),
	array('label'=>'Grades','url'=>array('grades/admin'),'visible'=>Yii::app()->user->checkAccess('Coordinator')),
	array('label'=>'Sponsors','url'=>array('sponsor/admin'),'visible'=>Yii::app()->user->checkAccess('sponsor/admin')),
	);
if(Yii::app()->user->checkAccess('profile/admin'))
  $this->report=array(
    array('label'=>'Allocations','url'=>array('profile/printIndex')),
    );

Yii::app()->clientScript->registerScript('search', "

$('.search-button').change(function(){
	$('#grades-search').show();
});

$('.search-form form').submit(function(){
	$('#grades-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
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
			'url'=>$this->createUrl('grades/create'),
			));
			?>
	</div>
	<div class="search-form">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		));?>
	</div>
</div>
<div class="clear"></div>
<div id="grades-search">
<?php $this->widget('ext.groupgridview.GroupGridView', array(
    'id' =>'grades-grid',
    'dataProvider' =>$model->search(),
    'mergeColumns' => array('application_id'),
    'itemsCssClass'=>'table',
    'columns'=>array(
		array(
			'header'=>'Name',
			'name'=>'application_id',
			'value'=>'$data->application->user->profile->Fullname',
		),
		
		array(
			'class' =>'editable.EditableColumn',
			'name' =>'GPA',
			'editable' => 
				array(
				'type' => 'text',
                 'url' => $this->createUrl('grades/update'), 
				'placement' => 'right',
				)               
			
		),
		
		array(
			'header'=>'Timeline',
			'name'=>'timeline_id',
			'value'=>'$data->timeline->TermName',
		),
		
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
		),*/
	),
)); ?>
</div>