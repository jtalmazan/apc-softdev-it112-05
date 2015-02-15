<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $Id
 * @property string $Lastname
 * @property string $Firstname
 * @property string $Middlename
 * @property string $Religion
 * @property integer $Sex
 * @property string $DateOfBirth
 * @property string $PlaceOfBirth
 * @property string $Address
 * @property string $ContactNumber
 * @property string $Email
 * @property string $FuturePlan
 * @property string $DateCreated
 * @property string $DateUpdate
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class Profile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profile';
	}

	public function getFullname()
	{
		return $this->Firstname.' '.$this->Lastname;
	}

	public function getGenders()
	{
		return array(
			0=>'Female',
			1=>'Male'
			);
	}

	public function getCivilStatus()
	{
		return array(
			'Single'=>'Single',
			'Married'=>'Married',
			'Widow/er'=>'Widow/er',
			'Separated'=>'Separated'
			);
	}
	public $fullname;
	public $Schoolname;
	public $Course;
	public $TuitionFee;
	public $Miscellaneous;
	public $Others;
	public $total;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Lastname, Firstname, Sex, ContactNumber, Email, Address ,CivilStatus', 'required'),
			array('Sex', 'numerical', 'integerOnly'=>true),
			array('Lastname, Firstname, CivilStatus', 'ext.alpha'),
			array('Middlename', 'length', 'max'=>30),
			array('Religion', 'length', 'max'=>30),
			array('PlaceOfBirth', 'length', 'max'=>45),
			array('Occupation ', 'length', 'max'=>30),
			array('Address', 'length', 'max'=>200),
			array('ContactNumber', 'length', 'max'=>15),
			array('Email', 'email'),
			array('Email', 'unique','message'=>'Email already exists!'),  
			array('DateOfBirth, FuturePlan, DateUpdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('keyword', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'User', 'Profile_Id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Lastname' => 'Lastname',
			'Firstname' => 'Firstname',
			'Middlename' => 'Middlename',
			'Religion' => 'Religion',
			'Sex' => 'Sex',
			'CivilStatus' => 'Civil Status',
			'DateOfBirth' => 'Date Of Birth',
			'PlaceOfBirth' => 'Place Of Birth',
			/*'Occupation' => 'Occupation',*/
			'Address' => 'Address',
			'ContactNumber' => 'Contact Number',
			'Email' => 'Email',
			'FuturePlan' => 'Future Plan',
			'DateCreated' => 'Date Created',
			'DateUpdate' => 'Date Update',
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
	public $keyword;
	public function search($type)
	{
		
		$criteria=new CDbCriteria;
		$criteria->select = array("t.Id as Id",
					"CONCAT(t.Firstname,' ', t.Lastname) as fullname",
					"school.Name as Schoolname",
					"application.Course as Course"
					);
		$criteria->join = "LEFT JOIN user ON user.Profile_Id = t.Id
							JOIN role on user.Role_Id = role.Id
							LEFT JOIN partnerschool ON user.Id = partnerschool.User_id
							LEFT JOIN school ON school.Id = partnerschool.School_Id
							LEFT JOIN application ON application.User_Id = user.Id";
		$criteria->order = 'school.Name';
		$criteria->condition = "role.Name=:type";
		$criteria->params = array(':type'=>$type);
		$criteria->compare("CONCAT(t.Firstname,' ', t.Lastname)",$this->keyword);
		$sort = new CSort();
		$sort->attributes = array(
		    'fullname'=>array(
		        'asc'=>'Firstname',
		        'desc'=>'Firstname DESC',
		    ),
		    'Schoolname'=>array(
		        'asc'=>'school.Name',
		        'desc'=>'school.Name DESC',
		    ),
		    'Course'=>array(
		        'asc'=>'application.Course',
		        'desc'=>'application.Course DESC',
		    ),
		    '*', // this adds all of the other columns as sortable
		);
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>$sort,
				'pagination' => array(
					'pagesize' => 30,
					),
				));
	}

	public function getStudentNames()
	{
		$criteria=new CDbCriteria;
		$criteria->select = array("CONCAT(t.Firstname,' ',t.Lastname) as fullname");
		$criteria->join="LEFT JOIN user ON user.Profile_Id = t.Id
							JOIN role ON role.Id = user.Role_Id";
		$criteria->condition="role.Name = 'Student'";
		$names = array();
		foreach(Profile::model()->findAll($criteria) as $profile){
			array_push($names, $profile->fullname);
		 }
		return $names;
	}

	public function getCoordinatorNames()
	{
		$criteria=new CDbCriteria;
		$criteria->select = array("CONCAT(t.Firstname,' ',t.Lastname) as fullname");
		$criteria->join="LEFT JOIN user ON user.Profile_Id = t.Id
							JOIN role ON role.Id = user.Role_Id";
		$criteria->condition="role.Name = 'Coordinator'";
		$names = array();
		foreach(Profile::model()->findAll($criteria) as $profile){
			array_push($names, $profile->fullname);
		 }
		return $names;
	}				

	public function getMyreport()
	{
		$from=$_REQUEST['from'];
		$until=$_REQUEST['until']; 
	        $sql="SELECT * FROM items where CREATED_DATE >= '$from' and CREATED_DATE <= '$until' order by ITEM_ID desc "; // your sql here
	        $dataReportItem=new CSqlDataProvider($sql,array(
	        	'keyField' => 'ITEM_ID',
	        	'pagination'=>array(
	        		'pageSize'=>10,
	        		),
	        	)); 
	        return $dataReportItem;
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function IsStudent($type)
	{
		return $type === "Student";
	}
}
