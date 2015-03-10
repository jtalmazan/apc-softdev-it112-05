<?php
$this->menu=array(
  array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student')),

  array('label'=>'Schools','url'=>array('school/admin')),
  array('label'=>'Grades','url'=>array('grades/admin')),
  array('label'=>'Sponsors','url'=>array('sponsor/admin')),
  );
$this->report=array(
  array('label'=>'Allocations','url'=>array('profile/printIndex')),
  );
 ?>

<?php $this->renderPartial('_print', array('school'=>$school,'timeline'=>$timeline,'academicYear'=>$academicYear)); ?>
