<?php

/**
 * This is the model class for table "academicyear".
 *
 * The followings are the available columns in table 'academicyear':
 * @property integer $Id
 * @property string $StartYear
 * @property string $EndYear
 *
 * The followings are the available model relations:
 * @property Timeline[] $timelines
 */
class Academicyear extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'academicyear';
	}

	public function getYears()
	{
		$years=array();
		for ($i=1990; $i <= date('Y'); $i++) { 
			array_push($years, $i);
		}
		return $years;
	}

	public function getAcademicYearId($start,$end)
	{
		$academmicyear= Academicyear::model()->findByAttributes(array('StartYear'=>$start,'EndYear'=>$end));
		 if($academmicyear === null) 
		 	return Academicyear::Insert($start,$end); 
		return $academmicyear->Id;
	}

	public function Insert($start,$end)
	{
		// $model=new Academicyear;
		// $model->StartYear=$start;
		// $model->EndYear=$end;
		// $model->save(false);
		// return $model->Id;
		$command = Yii::app()->db->createCommand();
		$command->insert('academicyear', array(
		    'StartYear'=>$start,
		    'EndYear'=>$end,
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
			array('StartYear', 'required'),
			array('StartYear, EndYear', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, StartYear, EndYear', 'safe', 'on'=>'search'),
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
			'timelines' => array(self::HAS_MANY, 'Timeline', 'academicyear_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'StartYear' => 'Start Year',
			'EndYear' => 'End Year',
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
		$criteria->compare('StartYear',$this->StartYear,true);
		$criteria->compare('EndYear',$this->EndYear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Academicyear the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
