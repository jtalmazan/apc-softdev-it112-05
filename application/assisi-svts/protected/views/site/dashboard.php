<?php
$this->menu=array(
	array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student'),'visible'=>Yii::app()->user->checkAccess('profile/admin')),

	array('label'=>'Schools','url'=>array('school/admin'),'visible'=>Yii::app()->user->checkAccess('school/admin')),
	array('label'=>'Grades','url'=>array('grades/admin'),'visible'=>Yii::app()->user->checkAccess('Coordinator')),
	array('label'=>'Sponsors','url'=>array('sponsor/admin'),'visible'=>Yii::app()->user->checkAccess('sponsor/admin')),
	);
if(Yii::app()->user->checkAccess('admin'))
  $this->report=array(
    array('label'=>'Allocations','url'=>array('profile/printIndex')),
    );
?>


<div class="shout-box">
      <div class="shout-text">
        <h1><b>Gado & Jess Jalandoni Scholarships</b></h1>
        <p>Scholarship Virtual Tracking System</p>
      </div>
</div>
      <div class="row-fluid">
          <br/>
          <b>Scholars Module</b>
          <p>In this module, the user can <i>Create a Scholar Record(s), View a Scholar Record(s), Add Allocation, and Update Informations of Students.</i> </p>

          <br/>
          <b>Coordinators Module</b>
          <p>In this module, the user can <i>Create a Coordinator and assign him/her to his/her specified college/university.</i> The coordinator will be the one who enters the grade of scholars in his/her assigned school.</p>

          <br/>
          <b>Schools Module</b>
          <p>In this module, the user can <i>Create a School</i> along with its addess and contact information. The user can also edit particular field(s).</p>

          <br/>
          <b>Grades Module</b>
          <p>In this module, the user will <i>Add Grades for their corresponding students. The user will indicate the Grade Point Average (GPA), the semester, and the student.</i> </p>

          <br/>
          <b>Sponsors Module</b>
          <p>In this module, the user can <i>Add New Sponsor(s)</i>. The user should also indicate the coordinator of the sponsor. </p>
          
          <br/>
      </div>
