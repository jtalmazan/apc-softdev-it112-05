<?php

/**
 * This is the model class for table "school".
 *
 * The followings are the available columns in table 'school':
 * @property integer $Id
 * @property string $Name
 * @property string $Address
 * @property string $ContactNo
 *
 * The followings are the available model relations:
 * @property Partnerschool[] $partnerschools
 */
class School extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'school';
	}

	public function GetSchools()
	{
		return CHtml::listData(School::model()->findAll(),'Id','Name');
	}

	public function getSchoolNames()
	{
		$names = array();
		foreach(School::model()->findAll() as $school)
		{
			array_push($names, $school->Name);
		}
		return $names;
	}

	public function GetSchoolsNoCoordinator()
	{
		// $existing = School::GetExisting();
		// $existing= implode($existing,',');
		// $sql = "SELECT * FROM `school` WHERE Id NOT IN (".$existing.") ORDER BY Name" ;
		// if(count(($existing) > 0)
		// 	$schools = School::model()->findAllBySql($sql);
		// else
		$schools = School::model()->findAll();
		return CHtml::listData($schools,'Id','Name');
	}

	public function GetExisting()
	{
		$criteria= new CDbCriteria;
		$criteria->join = "LEFT JOIN partnerschool ps ON ps.School_Id = t.Id
							LEFT JOIN user u ON u.Id = ps.User_Id
							LEFT JOIN role r ON r.Id = u.Role_Id";
		$criteria->condition = "r.Name='Coordinator'";
		$criteria->select= array('t.Id');
		$ids=array();
		foreach (School::model()->findAll($criteria) as $value) {
			array_push($ids, $value->Id);
		}
		return $ids;
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name','required','except'=>'report'),
			array('Name', 'length', 'max'=>45),
			array('Address', 'length', 'max'=>100),
			array('ContactNo', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Name, Address, ContactNo', 'safe', 'on'=>'search'),
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
			'partnerschools' => array(self::HAS_MANY, 'Partnerschool', 'School_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Name' => 'Name',
			'Address' => 'Address',
			'ContactNo' => 'Contact No',
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

		//$criteria->compare('Id',$this->Id);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('ContactNo',$this->ContactNo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return School the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
