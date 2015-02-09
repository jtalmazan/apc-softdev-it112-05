<?php

class ProfileController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'rights',
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
				),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','personalView','printIndex','sample','printCSV','ExportPdf','ExportCsv'),
				'users'=>array('@'),
				),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','print'),
				'users'=>array('@'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$user=User::model()->findByAttributes(array('Profile_Id'=>$id));
		$partnerSchool=Partnerschool::model()->findByAttributes(array('User_Id'=>$user->Id));
		$application=Application::model()->findByAttributes(array('User_Id'=>$user->Id));
		$allocation=new Allocation('search');//Allocation::model()->findAll('Application_Id=:id', array(':id' => $application->Id));
		$grades=new Grades('searchByApplicationId');
		$this->render('view',array(
			'model'=>$model,
			'user'=>$user,
			'partnerSchool'=>$partnerSchool,
			'application'=>$application,
			'allocation'=>$allocation,
			'grades'=>$grades
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($type)
	{
		$model=new Profile;
		$user=new User;
		$partnerSchool=new Partnerschool;
		$application=new Application;
		$allocation=new Allocation;
		$user->Role_Id = Role::model()->findByAttributes(array('Name'=>$type))->Id;
		$authAssignment= new Authassignment;
		$academicTerm=new Academicterm;
		$academicYear=new Academicyear;

		if($type === "Student")
		{
			$model->scenario = 'student';
			$allocation->scenario='student';
			$type="Student";
		}
		else
		{
			$model->scenario = 'coordinator';
			$type="Coordinator";
		}

		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation(array($model,$partnerSchool,$academicYear,$academicTerm));

		if(isset($_POST['Profile'],$_POST['Partnerschool']))
		{

			$model->attributes=$_POST['Profile'];
			$model->DateCreated = date("Y-m-d");
			$model->DateOfBirth = date("Y-m-d",strtotime($model->DateOfBirth));
			$partnerSchool->attributes=$_POST['Partnerschool'];
			$valid = $model->validate() && $partnerSchool->validate();
			if($type === "Student")
			{
				$application->attributes= $_POST['Application'];
				$allocation->attributes= $_POST['Allocation'];
				$academicYear->attributes= $_POST['Academicyear'];
				$academicTerm->attributes=$_POST['Academicterm'];
				$application->SponsoredYears = 1;
				$valid = $allocation->validate() && $application->validate() && $academicTerm->validate() && $academicYear->validate()  && $valid;
			}
			if($valid)
			{
				if($model->save())
				{
					$user->Username = $this->GenerateUsername($model->Firstname,$model->Lastname);
					$password = $this->randomPassword();
					$user->Password = $this->hashPassword($password);
					$user->Profile_Id = $model->Id;
					if($user->save())
					{
						$partnerSchool->User_Id = $user->Id;
						if($partnerSchool->save())
						{
							if($type === 'Student')
							{
								$application->User_Id = $user->Id;
								if($application->save(false))
								{
									$allocation->Application_Id = $application->Id;
									$yearId= $academicYear->getAcademicYearId($academicYear->StartYear,$academicYear->EndYear);
									$timelineId=Timeline::getTimelineId($yearId,$_POST['Academicterm']['Id']);
									$allocation->Timeline_Id=$timelineId;
									$allocation->save();
								}
							}
						}
						
						$this->sendEmail($type,$model->Lastname,$model->Firstname,$user->Username,$password,$model);
						$authAssignment->itemname=$type;
						$authAssignment->userid=$user->Id;
						$authAssignment->save();						
						$this->redirect(array('view','id'=>$model->Id));
					}
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'user'=>$user,
			'partnerSchool'=>$partnerSchool,
			'application'=>$application,
			'allocation'=>$allocation,
			'academicTerm'=>$academicTerm,
			'academicYear'=>$academicYear,
			));
	}

	private function sendEmail($type,$lastname,$firstname,$username,$password,$model)
	{
		//use 'contact' view from views/mail
		$mail = new YiiMailer('register', array('title' => $type,'lastname'=>$lastname,'firstname'=>$firstname,'username' => $username, 'password' => $password));
		//set properties
		$mail->setFrom(Yii::app()->params['adminEmail']);
		$mail->setSubject('DO NOT REPLY');
		$mail->setTo($model->Email);
		$mail->send();
		//Send
		// if () {
		// 	Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
		// } else {
		// 	Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
		// }
	}

	private function hashPassword($password)
	{
		$salt = openssl_random_pseudo_bytes(22);
		$salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
		$password_hash = crypt($password, $salt);
		return $password_hash;
	}

	private function GenerateUsername($firstname,$lastname)
	{
		$firstname = str_replace(' ', '',$firstname);
		$lastname = str_replace(' ','',$lastname);
		$fnameLength = strlen($firstname);
		$firstname = strtolower($firstname);
		$lastname = strtolower($lastname);
		$char = "";
		$username = "";
		for($i=0; $i < $fnameLength; $i++){
			$char = $firstname{$i};
			$username = $char.$lastname;
			if(!$this->IsExist($username)){
				return $username;
				break;
			}
		}
	}

	private function randomPassword() {
		$characters = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); 
		$charactersLength = strlen($characters) - 1; 
		for ($i=0; $i<8; $i++) {
			$n=rand(0, $charactersLength);
			$pass[]=$characters[$n];
		}
		return implode($pass); 
	}

	private function IsExist($username){
		$Criteria = new CDbCriteria();
		$Criteria->condition = "Username = '$username'";
		$query = User::model()->findAll($Criteria);
		$count = count($query);
		if($count > 0){
			return true;
		}
		return false;
	}	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	//public function actionUpdate($id)
	public function actionUpdate()
	{
		$es = new EditableSaver('Profile');  //'Profile' is name of model to be updated
		$es->update();
	}		
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function behaviors() {
    return array(
        'exportableGrid' => array(
            'class' => 'application.components.ExportableGridBehavior',
            'filename' => 'AllocationPerStudent.csv',
            'csvDelimiter' => ';', //i.e. Excel friendly csv delimiter
            ));
	}

	public function actionIndex($type)
	{
		$model=new Profile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Profile']))
			$model->attributes=$_GET['Profile'];
		$dataProvider = $model->search($type);

		# mPDF
        $mPDF1 = Yii::app()->ePdf->mpdf();
 
 		 $mPDF1->WriteHTML($this->render('printPDF', array('model'=>$model,
			'dataProvider'=>$dataProvider,
			'type'=>$type), true));
 		# renderPartial (only 'view' of current controller)
       /* $mPDF1->WriteHTML($this->renderPartial('printPDF', array('model'=>$model,
			'dataProvider'=>$dataProvider,
			'type'=>$type), true));*/

        # Outputs ready PDF
        $mPDF1->Output();

	}

	public function actionPrintIndex()
	{
		$school=new School;
		$timeline=new Timeline;
		$criteria=new CDbCriteria;
		$timeline->scenario="report";
		$school->scenario="report";
		$academicYear=new Academicyear;
		// if(isset($_POST['School'],$_POST['Academicyear']))
		// {
		// 	$schoolId = $_POST['School']['Id'];
		// 	$start = $_POST['Academicyear']['StartYear'];
		// 	$end = $_POST['Academicyear']['EndYear'];
		// 	if($schoolId != 0)
		// 	{
		// 		$criteria->condition = "Id=:id";
		// 		$criteria->params = array(':id'=>$schoolId);
		// 	}
		// 	$schools = School::model()->findAll($criteria);
		// 	$mPDF1 = Yii::app()->ePdf->mpdf();
		// 	$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		// 	$mPDF1->WriteHTML($stylesheet, 1);
	 // 		$mPDF1->WriteHTML($this->renderPartial('printPDF', array('schools'=>$schools,'start'=>$start,'end'=>$end), true));
	 //        $mPDF1->Output();
		// }
		$this->render('printIndex',array('school'=>$school,'timeline'=>$timeline,'type'=>'Student','academicYear'=>$academicYear));
	}

	public function actionExportPdf($school,$start,$end)
	{
		$criteria=new CDbCriteria;
		if($school !== "")
		{
			$criteria->condition = "Id=:id";
			$criteria->params = array(':id'=>$school);
		}
		$schools = School::model()->findAll($criteria);
		$mPDF1 = Yii::app()->ePdf->mpdf();
		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		$mPDF1->WriteHTML($stylesheet, 1);
 		$mPDF1->WriteHTML($this->renderPartial('printPDF', array('schools'=>$schools,'start'=>$start,'end'=>$end), true));
        $mPDF1->Output();
	}

	public function actionExportCsv($school,$start,$end)
	{
		$criteria=new CDbCriteria;
		$criteria->select= array(
			"CONCAT(t.Firstname,' ',t.Lastname) as 'fullname'",
			"s.Name as 'Schoolname'",
			"a.Course as 'Course'",
			"SUM(al.TuitionFee+al.Miscellaneous+al.Others) as 'total'",
			);
		$criteria->join = "LEFT JOIN user u ON u.Profile_Id=t.Id
				INNER JOIN partnerschool ps ON ps.User_Id=u.Id
				INNER JOIN school s ON s.Id = ps.School_Id
				INNER JOIN application a ON a.User_Id=u.Id
				INNER JOIN allocation al ON al.Application_Id=a.Id
				INNER JOIN timeline timeline ON timeline.Id=al.Timeline_Id
				INNER JOIN academicyear ay ON ay.Id=timeline.academicyear_id";
		if($school !== "")
		{
			$criteria->condition= "ay.StartYear = :start AND ay.EndYear = :end AND s.Id=:id";
			$criteria->params = array(':start'=>$start,'end'=>$end,'id'=>$school);
		}else{
			$criteria->condition= "ay.StartYear = :start AND ay.EndYear = :end";
			$criteria->params = array(':start'=>$start,'end'=>$end);
		}		
		$criteria->group="t.Id";
		$model= new CActiveDataProvider('Profile', array(
				'criteria'=>$criteria,
				));
		
		  if ($this->isExportRequest()) { 
            $this->exportCSV(array('POSTS WITH FILTER:'), null, false);
            $this->exportCSV($model, array('fullname', 'Schoolname', 'Course', 'total'));
         }
         $this->render('exportCsv',array('model'=>$model));
	}
			

	public function getStudentInSchoolAndAllocationInPeriodOf($school,$start,$end)
	{
		$criteria=new CDbCriteria;
		$criteria->select = array("CONCAT(t.Lastname,' ',t.Firstname) as fullname","a.Course as Course","a.Id");
		$criteria->join = "JOIN user u 
							ON u.profile_Id = t.Id
						  JOIN  role r
							ON r.Id = u.role_Id
						  JOIN partnerschool ps
							ON ps.User_Id = u.Id
						  JOIN application a
							ON a.User_Id = u.Id";
		$criteria->condition="r.Name = 'Student' AND ps.School_Id=:schoolId";
		$criteria->params = array(':schoolId'=>$school->Id);
		$criteria->order = "t.Lastname ASC";
		$students = Profile::model()->findAll($criteria);
		foreach ($students as $key=> $value) {
			echo "<tr>";
			echo "<td>".$value->fullname."</td>";
			echo "<td>".$value->Course."</td>";
			$this->getAllocation($value->Id,$start,$end);
			echo "</tr>";
		}
	}

	private function getAllocation($id,$start,$end)
	{
		$criteria=new CDbCriteria;
		$criteria->select = array("SUM(t.TuitionFee) as TuitionFee","SUM(t.Miscellaneous) as Miscellaneous","SUM(t.Others) as Others");
		$criteria->join = "JOIN timeline ON t.Timeline_Id = timeline.Id
							JOIN academicyear ac ON ac.Id = timeline.academicyear_Id";
		$criteria->condition="t.Application_Id=:id AND ac.StartYear=:start AND ac.EndYear=:end";
		$criteria->params=array(':id'=>$id,':start'=>$start,'end'=>$end);
		$allocations = Allocation::model()->findAll($criteria);
		$total = 0;
		foreach ($allocations as $key => $value) {
			$total += ($value->TuitionFee + $value->Miscellaneous + $value->Others);
		}
		echo "<td>".$total."</td>";
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Profile('search');
        $model->unsetAttributes();  
        if(isset($_GET['Profile']))
            $model->attributes=$_GET['Profile'];

        $this->render('admin',array(
            'model'=>$model,
        ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Profile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Profile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionPersonalView($id)
	{
		$this->layout='column1';
		$model = $this->loadModel($id);


		if(isset($_POST['Profile']))
		{
			$model->attributes=$_POST['Profile'];
			if($model->save())
				$this->redirect(array('personalView','id'=>$model->Id));
		}

		$this->render('personalView',array(
			'model'=>$model,
			));
	}

	/**
	 * Performs the AJAX validation.
	 * @param Profile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
