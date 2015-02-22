<?php
/* @var $this SchoolController */
/* @var $model School */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php $this->widget('bootstrap.widgets.TbTypeahead', array(
			    'name'=>'School[Name]',
			    'options'=>array(
			        'source'=>$model->getSchoolNames(),
			        'items'=>4,
			        'matcher'=>"js:function(item) {
			            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
			        }",
			    ),
			));?>
		<?php //echo $form->textField($model,'Name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->