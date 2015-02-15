<?php

class PasswordController extends Controller
{
	public function actionChange()
	{
		if(isset($_POST['currentPassword']) && isset($_POST['newPass']) && isset($_POST['repNewPass'])){
			$user = User::model()->findByPk(Yii::app()->user->id);
			$salt = openssl_random_pseudo_bytes(22);
			$salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
			//$password_hash = crypt($_POST['currentPassword'], $salt);
			if($_POST['newPass'] == $_POST['repNewPass'])
			{
				$user->Password =crypt($_POST['newPass'], $salt);
				$user->save();
				$this->redirect(array('site/index'));
			}
		}
		$this->render('change');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}