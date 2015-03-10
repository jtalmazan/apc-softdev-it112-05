<?php
/* @var $this ProfileController */
/* @var $model Profile */
$this->menu=array(
  array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student'),'active'=>($_GET['type']==='Student')),

  array('label'=>'Schools','url'=>array('school/admin')),
  array('label'=>'Grades','url'=>array('grades/admin')),
  array('label'=>'Sponsors','url'=>array('sponsor/admin')),
  );
$this->report=array(
  array('label'=>'Allocations','url'=>array('profile/printIndex')),
  );
Yii::app()->clientScript->registerScript('search', "
  $('.search-form form').submit(function(){
    $('#profile-grid').yiiGridView('update', {
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
    'url'=>$this->createUrl('profile/create',array('type'=>$_GET['type'])),
    ));
    ?>
  </div>
  <div class="search-form">
  	<?php $this->renderPartial('_search',array(
      'model'=>$model
      )); ?>
    </div> 
  </div>
  <div class="clear"></div>
  <?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'profile-grid',
    'dataProvider' =>$model->search($_GET['type']),
    'columns' =>array(
      'fullname',
      'Schoolname',
      array(
       'name'=>'Course',
       'visible'=>($_GET['type'] === "Student"),
       ),
      array(
        'class'=>'bootstrap.widgets.TbButtonColumn',
        'template'=>'{view}',
        /*'htmlOptions'=>array('style'=>'display:inline-flex;'),*/
        ),        
      ),
    ));

  ?>