<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	   private $_id;
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('Username'=>$this->username));
        $salt = openssl_random_pseudo_bytes(22);
        $salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
        $password_hash = crypt($this->password, $salt);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->Password!==$password_hash)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
           $profile=Profile::model()->findByAttributes(array('Id'=>$record->Profile_Id));
           $school= Partnerschool::model()->findByAttributes(array('User_Id'=>$record->Id));
           $this->_id=$record->Id;
           /*$this->setState('title', $record->title);*/
           Yii::app()->session['profileId'] = $profile->Id; 
           Yii::app()->session['Fullname'] = $profile->Firstname.' '.$profile->Lastname;
           if(!is_null($school))
            Yii::app()->session['SchoolId'] = $school->School_Id;
        $this->errorCode=self::ERROR_NONE;
    }
    return !$this->errorCode;
}
  public function getId()
  {
      return $this->_id;
  }
}