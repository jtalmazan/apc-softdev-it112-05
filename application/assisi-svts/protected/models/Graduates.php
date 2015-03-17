<?php

/**
 * This is the model class for table "graduates".
 *
 * The followings are the available columns in table 'graduates':
 * @property integer $id
 * @property string $name
 * @property string $name_of_school
 * @property string $year_started_of_scholarship
 * @property string $year_graduated
 * @property string $course_title
 * @property string $honors_recieved
 * @property string $current_status
 * @property string $current_employment
 */
class Graduates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'graduates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, name_of_school, year_started_of_scholarship, year_graduated, course_title, honors_recieved, current_status, current_employment', 'required'),
			array('name, name_of_school', 'length', 'max'=>30),
			array('year_started_of_scholarship, year_graduated', 'length', 'max'=>4),
			array('course_title, honors_recieved, current_employment', 'length', 'max'=>100),
			array('current_status', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, name_of_school, year_started_of_scholarship, year_graduated, course_title, honors_recieved, current_status, current_employment', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'name_of_school' => 'Name Of School',
			'year_started_of_scholarship' => 'Year Started Of Scholarship',
			'year_graduated' => 'Year Graduated',
			'course_title' => 'Course Title',
			'honors_recieved' => 'Honors Recieved',
			'current_status' => 'Current Status',
			'current_employment' => 'Current Employment',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_of_school',$this->name_of_school,true);
		$criteria->compare('year_started_of_scholarship',$this->year_started_of_scholarship,true);
		$criteria->compare('year_graduated',$this->year_graduated,true);
		$criteria->compare('course_title',$this->course_title,true);
		$criteria->compare('honors_recieved',$this->honors_recieved,true);
		$criteria->compare('current_status',$this->current_status,true);
		$criteria->compare('current_employment',$this->current_employment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Graduates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
