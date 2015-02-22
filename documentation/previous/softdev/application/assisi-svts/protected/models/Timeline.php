<?php

/**
 * This is the model class for table "timeline".
 *
 * The followings are the available columns in table 'timeline':
 * @property integer $Id
 * @property integer $academicyear_id
 * @property integer $academicterm_id
 *
 * The followings are the available model relations:
 * @property Allocation[] $allocations
 * @property Grades[] $grades
 * @property Academicyear $academicyear
 * @property Academicterm $academicterm
 */
class Timeline extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'timeline';
	}


	public function getTermName()
	{
		return $this->academicterm->TermName.' ('.$this->academicyear->StartYear.'-'.$this->academicyear->EndYear.')';
	}

	public function getTimelineId($year,$term)
	{
		$timeline=Timeline::model()->findByAttributes(array('academicyear_id'=>$year,'academicterm_id'=>$term));
		if($timeline===null)
			return Timeline::Insert($year,$term);
		return $timeline->Id;
	}

	public function getSponsoredYears($id)
	{
		$criteria=new CDbCriteria;
		$criteria->distinct = true;
		$criteria->select = 't.academicyear_id';
		$criteria->condition = "a.Application_Id = :id";
		$criteria->join = "JOIN allocation a ON a.Timeline_Id = t.Id";
		$criteria->params = array(':id'=>$id);
	 	$sql = Timeline::model()->findAll($criteria);
	 	$count = count($sql);
	 	for ($i=0; $i < $count ; $i++) { 
	 		echo '*';
	 	}
	}


	public function Insert($year,$term)
	{
		$command = Yii::app()->db->createCommand();
		$command->insert('timeline', array(
		    'academicyear_id'=>$year,
		    'academicterm_id'=>$term,
		));
		return Yii::app()->db->getLastInsertID();
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('academicyear_id, academicterm_id', 'required'),
			array('academicyear_id, academicterm_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, academicyear_id, academicterm_id', 'safe', 'on'=>'search'),
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
			'allocations' => array(self::HAS_MANY, 'Allocation', 'Timeline_Id'),
			'grades' => array(self::HAS_MANY, 'Grades', 'Timeline_Id'),
			'academicyear' => array(self::BELONGS_TO, 'Academicyear', 'academicyear_id'),
			'academicterm' => array(self::BELONGS_TO, 'Academicterm', 'academicterm_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'academicyear_id' => 'Academicyear',
			'academicterm_id' => 'Academicterm',
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
		$criteria->compare('academicyear_id',$this->academicyear_id);
		$criteria->compare('academicterm_id',$this->academicterm_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Timeline the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
