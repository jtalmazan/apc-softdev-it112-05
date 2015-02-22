<?php
/* @var $this ProfileController */
/* @var $model Profile */
// $this->menu=array(
//   array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student')),
//   array('label'=>'Coordinators','url'=>array('profile/admin','type'=>'Coordinator')),
//   array('label'=>'Schools','url'=>array('school/admin')),
//   array('label'=>'Grades','url'=>array('grades/admin')),
//   array('label'=>'Sponsors','url'=>array('sponsor/admin')),
//   );
// $this->report=array(
//   array('label'=>'Allocations','url'=>array('profile/printIndex')),
//   array('label'=>'Allocation_per_Scholars.csv','url'=>array('profile/printCSV','type'=>'Student'),'active'=>($_GET['type']==='Student')),
//   );
// Yii::app()->clientScript->registerScript('search', "
//   $('.search-form form').submit(function(){
//     $('#profile-grid').yiiGridView('update', {
//       data: $(this).serialize()
//     });
// return false;
// });
// ");
?>

  <?php $gridWidget=$this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'profile-grid',
    'dataProvider' =>$model,
    'columns' =>array(
      'fullname',
      'Schoolname',
      'Course',
      'total'
      ),
    ));?>

    <?php 
    $this->renderExportGridButton($gridWidget,'Export',array('class'=>'btn btn-info pull-right'));
    ?>