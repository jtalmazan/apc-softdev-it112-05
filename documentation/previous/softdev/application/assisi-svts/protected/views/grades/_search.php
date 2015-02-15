<?php
/* @var $this GradesController */
/* @var $model Grades */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php $this->widget('bootstrap.widgets.TbTypeahead', array(
			    'name'=>'Grades[StudentName]',
			    'options'=>array(
			        'source'=>Profile::model()->getStudentNames(),
			        'items'=>4,
			        'matcher'=>"js:function(item) {
			            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
			        }",
			    ),
			));
			?>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->