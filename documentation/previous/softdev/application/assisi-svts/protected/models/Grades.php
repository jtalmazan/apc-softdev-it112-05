<?php

/**
 * This is the model class for table "grades".
 *
 * The followings are the available columns in table 'grades':
 * @property integer $Id
 * @property string $GPA
 * @property integer $Timeline_Id
 * @property integer $Application_Id
 *
 * The followings are the available model relations:
 * @property Timeline $timeline
 * @property Application $application
 */
class Grades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GPA, Timeline_Id, Application_Id', 'required'),
			array('Timeline_Id, Application_Id', 'numerical', 'integerOnly'=>true),
			array('GPA', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('StudentName', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'timeline' => array(self::BELONGS_TO, 'Timeline', 'Timeline_Id'),
			'application' => array(self::BELONGS_TO, 'Application', 'Application_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'GPA' => 'Grade Point Average (GPA)',
			'Timeline_Id' => 'Timeline',
			'Application_Id' => 'Application',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */

	public $StudentName;
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$user = User::model()->findByAttributes(array('Id'=>Yii::app()->user->Id));
		if($user->Role_Id != 1)
		{
			$criteria->condition = "ps.School_Id = :schoolid";
			$criteria->params = array(':schoolid'=>Yii::app()->session['SchoolId']);
		}

		$criteria->compare('Id',$this->Id);
		$criteria->compare('GPA',$this->GPA,true);
		$criteria->compare('Timeline_Id',$this->Timeline_Id);
		$criteria->join = "JOIN application a ON a.Id = t.Application_Id
							JOIN user u ON u.Id = a.User_Id
							JOIN profile p ON u.Profile_Id = p.Id
							JOIN partnerschool ps ON ps.User_Id = u.Id";
		$criteria->compare("CONCAT(p.Firstname,' ',p.Lastname)",$this->StudentName,true);
		$criteria->compare('Application_Id',$this->Application_Id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchByApplicationId($id)
	{
		$criteria=new CDbCriteria;
		$criteria->join = "JOIN application a ON a.Id = t.Application_Id
							JOIN user u ON u.Id = a.User_Id
							JOIN profile p ON u.Profile_Id = p.Id";
		$criteria->condition='Application_Id=:a';
		$criteria->params = array(':a'=>$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/*public function getStudentNames()
	{
		$criteria=new CDbCriteria;
		$criteria->select = array("CONCAT(Firstname,' ',Lastname) as fullname");
		$criteria->join="LEFT JOIN user ON user.Profile_Id = t.Id
							JOIN role ON role.Id = user.Role_Id";
		$criteria->condition="role.Name = 'Student'";
		$names = array();
		foreach(Profile::model()->findAll($criteria) as $profile){
			array_push($names, $profile->fullname);
		 }
		return $names;
	}*/

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Grades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
