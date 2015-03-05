<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->Id,
	);

$type = Role::model()->findByPk($user->Role_Id)->Name;
$this->menu=array(
  array('label'=>'Scholars','url'=>array('profile/admin','type'=>'Student'),'active'=>($type==='Student')),
  array('label'=>'Coordinators','url'=>array('profile/admin','type'=>'Coordinator'),'active'=>($type==='Coordinator')),
  array('label'=>'Schools','url'=>array('school/admin')),
  array('label'=>'Grades','url'=>array('grades/admin')),
  array('label'=>'Sponsors','url'=>array('sponsor/admin')),
  );

$this->report=array(
  array('label'=>'Allocations','url'=>array('profile/printIndex')),
  );
	?>

	<h1><?php echo $model->getFullname();
        if($type==='Student')
        echo Timeline::getSponsoredYears($application->Id); ?></h1>
    
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<!-- <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div> -->
 
<div class="modal-body">
    <?php
    if (!is_null($application)) {
        $all=new Allocation;
        $academicYear=new Academicyear;
        $academicTerm=new Academicterm;
        $all->Application_Id=$application->Id;
        $all->scenario="created";

        echo $this->renderPartial('/allocation/_form', array('model'=>$all,'academicTerm'=>$academicTerm,
            'academicYear'=>$academicYear)); 
    }
    ?>
</div>
 
<!-- <div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div> -->
 
<?php $this->endWidget(); ?>   

<?php
    $this->widget('editable.EditableDetailView', array(
    'data'       => $model,
    //you can define any default params for child EditableFields 
    'url'        => $this->createUrl('profile/update'), //common submit url for all fields
    'params'     => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
    'emptytext'  => 'no value',
    //'apply' => false, //you can turn off applying editable to all attributes
      
    'attributes' => array(
        array(
            'name' => 'Firstname',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',                
                'validate'   => 'js:function(value) {
                    if(!value) return "Firstname is required";
                }'
            ),
        ),
        array(
            'name' => 'Middlename',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',                
            ),
        ),
        array(
            'name' => 'Lastname',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',                
                'validate'   => 'function(value) {
                    if(!value) return "Lastname is required"
                }'
            ),
        ),
        array(
            'name' => 'Religion',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',           
            ),
            'visible'=>($type === "Student"),
        ),
        array(
            'name' => 'Sex',
            'editable' => array(
                'type'       => 'select',
                'source'    => Editable::source(Profile::model()->getGenders()),
                'placement' => 'right',           
            ),
        ),
        array(
            'name' => 'CivilStatus',
            'editable' => array(
                'type'       => 'select',
                'source'    => Editable::source(Profile::model()->getCivilStatus()),
                'placement' => 'right',           
            )
        ),
        array(
            'name' => 'DateOfBirth',
            'editable' => array(
                'type'       => 'date',
                'placement' => 'right',
                'format'      => 'yyyy-mm-dd', //format in which date is expected from model and submitted to server
                'viewformat'  => 'dd/mm/yyyy',          
            ),
        ),
        array(
            'name' => 'PlaceOfBirth',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',           
            ),
            'visible'=>($type === "Student"),
        ),
        array(
            'name' => 'Address',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',           
            ),
        ),
        array(
            'name' => 'ContactNumber',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',           
            ),
        ),
        array(
            'name' => 'Email',
            'editable' => array(
                'type'       => 'text',
                'placement' => 'right',           

            ),
        ), 
        //array(
          //  'name'=>'Occupation',
           // 'visible'=>($type === "Student"),
          //  ),
        array(
            'name'=>'FuturePlan',
            'visible'=>($type === "Student"),
            ),
    )
    ));
?>
<?php if($type === "Student") : ?>
<h1>Application Details</h1>
<?php 
// $this->widget('editable.EditableDetailView', array(
// 	'data'=>$partnerSchool,
//     'apply' => false,
//     'htmlOptions'=>array('style'=>'padding-bottom:200px;'),
// 	'attributes'=>array(
// 		array(
// 		'name'=>'School',
// 		'header'=>'School',
// 		'value'=>$partnerSchool->school->Name,
// 		),
// 	),
// )); 
$this->widget('editable.EditableDetailView', array(
    'data'=>$application,
   
    'attributes'=>array(
	array(
        'name' =>'Schoolname',
		 'editable' => array(
                'type'       => 'select',
                'source'    => Editable::source(School::model()->getSchools()),
                'placement' => 'right',           
            )
        ),
        'TypeOfApplication',
        'Course',
        'Duration',
    ),
));
?>
<h1>Grades</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' =>'grades-grid',
    'itemsCssClass' =>'table-bordered items',
    'htmlOptions' => array('style' => 'width:350px;'),
    'dataProvider' =>$grades->searchByApplicationId($application->Id),
    'columns'=>array(
        array(
            'class' =>'editable.EditableColumn',
            'name' =>'GPA',
            'editable' => 
                array(
                'type' => 'text',
                 'url' => $this->createUrl('grades/update'), 
                'placement' => 'right',
                )               
        ),
        array(
            'header'=>'Timeline',
            'name'=>'timeline_id',
            'value'=>'$data->timeline->TermName',
        ),
    ),
)); ?>

<?php if(is_null($allocation->id)) : ?>

<?php endif; ?>
<?php endif; ?>

