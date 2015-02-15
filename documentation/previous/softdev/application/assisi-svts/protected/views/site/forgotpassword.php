<?php
/* @var $this SchoolController */
/* @var $model School */
/* @var $form CActiveForm */
?>

<div class="wide form">
<?php if(Yii::app()->user->hasFlash('forgetpassword')): ?>

<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('forgetpassword'); ?>
</div>
<?php else: ?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'post',
)); ?>

    <div class="row">
        <h1>Find Your Account</h1><br/>
        <h6>Please enter your username</h6>
        <?php echo $form->textField($model,'Username',array('size'=>45,'maxlength'=>45)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>
<?php endif; ?>
</div><!-- search-form -->