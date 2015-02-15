<?php

/**
 * This is the model class for table "application".
 *
 * The followings are the available columns in table 'application':
 * @property integer $Id
 * @property string $TypeOfApplication
 * @property string $Course
 * @property string $Duration
 * @property integer $SponsoredYears
 * @property integer $User_Id
 *
 * The followings are the available model relations:
 * @property Allocation[] $allocations
 * @property User $user
 * @property Grades[] $grades
 */
class Application extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application';
	}
	
	public function GetStudentBySchoolId($id)
	{
		$role= Role::model()->findByAttributes(array('Name'=>'Student'));
		$criteria=new CDbCriteria;
		$criteria->join = "LEFT JOIN user u ON  u.Id = t.User_Id
						   LEFT JOIN partnerschool ps ON ps.User_Id = u.Id";
		$criteria->condition =  "Role_Id=:role AND ps.School_Id=:school";
		$criteria->params = array('role'=>$role->Id,':school'=>$id);
		return CHtml::listData(Application::model()->findAll($criteria),'Id','Fullname'); 
	}
	
	public function getFullname()
	{
		return $this->user->profile->Firstname.' '.$this->user->profile->Lastname;
	}
	public $school;

	public function getSchoolname()
	{
		$partnerschool= Partnerschool::model()->findByAttributes(array('User_Id'=>$this->user->Id));
		return $partnerschool->school->Name;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TypeOfApplication, Course', 'required'),
			array('SponsoredYears, User_Id', 'numerical', 'integerOnly'=>true),
			array('TypeOfApplication', 'length', 'max'=>45),
			array('Course', 'ext.alpha'),
			array('Duration', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, TypeOfApplication, Course, Duration, SponsoredYears, User_Id', 'safe', 'on'=>'search'),
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
			'allocations' => array(self::HAS_MANY, 'Allocation', 'Application_Id'),
			'user' => array(self::BELONGS_TO, 'User', 'User_Id'),
			'grades' => array(self::HAS_MANY, 'Grades', 'Application_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'TypeOfApplication' => 'Type Of Application',
			'Course' => 'Course',
			'Duration' => 'Duration (year)',
			'SponsoredYears' => 'Sponsored Years',
			'User_Id' => 'User',
			'Schoolname'=> 'School'
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('TypeOfApplication',$this->TypeOfApplication,true);
		$criteria->compare('Course',$this->Course,true);
		$criteria->compare('Duration',$this->Duration,true);
		$criteria->compare('SponsoredYears',$this->SponsoredYears);
		$criteria->compare('User_Id',$this->User_Id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Application the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
