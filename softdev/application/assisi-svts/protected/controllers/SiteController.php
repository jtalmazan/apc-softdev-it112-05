<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				//use 'contact' view from views/mail
				$mail = new YiiMailer('contact', array('message' => $model->body, 'name' => $model->name, 'description' => 'Contact form'));
				//set properties
				$mail->setFrom($model->email, $model->name);
				$mail->setSubject($model->subject);
				$mail->setTo(Yii::app()->params['adminEmail']);
				//send
				if ($mail->send()) {
					Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				} else {
					Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
				}
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}


	public function actionForgotpassword() 
    {
       $model=new User;
		if(isset($_POST['User']['Username']))
		{
			$username =$_POST['User']['Username'];
			$user=User::model()->findByAttributes(array('Username'=>$username));
			if($user===null)
			Yii::app()->user->setFlash('error','Cannot Find your Username ');
			else{
				$newpassword = $this->randomPassword();
				$salt = openssl_random_pseudo_bytes(22);
				$salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
				$password_hash = crypt($newpassword, $salt);
				$user->Password = $password_hash;

				$user->save();

				//use 'contact' view from views/mail
				$mail = new YiiMailer('newpassword', array('lastname'=>$user->profile->Lastname,'firstname'=>$user->profile->Firstname,'username' => $user->Username, 'password' => $newpassword));
				//set properties
				$mail->setFrom(Yii::app()->params['adminEmail']);
				$mail->setSubject('DO NOT REPLY');
				$mail->setTo($user->profile->Email);
				//Send
				if ($mail->send()) {
					Yii::app()->user->setFlash('forgetpassword','<h2><b>
						The System  have successfully reset your password and sent it to your email account.<br/><br/>
						Never lose access to your account.<br/><br/>
						Kindly go to Login Page</b></h2>');
				} else {
					Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
				}

			}
		}
		$this->render('forgotpassword',array(
			'model'=>$model,
		));

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

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	public function actionDashboard()
	{
		$this->layout='column2';
		$this->render('dashboard');
	}
}