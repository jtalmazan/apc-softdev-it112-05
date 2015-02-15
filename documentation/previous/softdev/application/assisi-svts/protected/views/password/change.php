
<?php if(Yii::app()->user->hasFlash('wrongpass')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('wrongpass'); ?>
    </div>
<?php endif; ?>
<div class="form">
<?php echo CHtml::beginForm(); ?>

    <div class="row">
        <?php echo CHtml::label('Current Password:',''); ?>
        <?php echo CHtml::passwordField('currentPassword','') ?>
    </div>
	<div class="row">
        <?php echo CHtml::label('New Password:',''); ?>
        <?php echo CHtml::passwordField('newPass','') ?>
    </div>
	<div class="row">
        <?php echo CHtml::label('Repeat New Password:',''); ?>
        <?php echo CHtml::passwordField('repNewPass','') ?>
    </div>
	

    <div class="row submit">
        <?php echo CHtml::submitButton('Save'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->