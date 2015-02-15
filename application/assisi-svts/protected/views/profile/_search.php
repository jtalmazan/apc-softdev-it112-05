<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php  $this->widget('bootstrap.widgets.TbTypeahead', array(
			    'name'=>'Profile[keyword]',
			    'options'=>array(
			        'source'=>$_GET['type']=== 'Student' ? $model->getStudentNames() : $model->getCoordinatorNames(),
			        'items'=>4,
			        'matcher'=>"js:function(item) {
			            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
			        }",

			    ),
			));

       // echo $form->textField($model,'keyword',array('size'=>30,'maxlength'=>30)); ?>
    </div>

<!--     <div class="row">
        <?php //echo $form->textField($model,'fullname',array('size'=>30,'maxlength'=>30)); ?>
    </div> -->

   <!--  <div class="row buttons">
        <?php /*echo CHtml::submitButton('Search');*/ ?>
    </div> -->

<?php $this->endWidget(); ?>

</div><!-- search-form -->
