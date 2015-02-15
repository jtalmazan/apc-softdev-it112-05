<?php
/* @var $this SponsorController */
/* @var $model Sponsor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php $this->widget('bootstrap.widgets.TbTypeahead', array(
			    'name'=>'Sponsor[Name]',
			    'options'=>array(
			        'source'=>$model->getSponsorNames(),
			        'items'=>4,
			        'matcher'=>"js:function(item) {
			            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
			        }",
			    ),
			)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->