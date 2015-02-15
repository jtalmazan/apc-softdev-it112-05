<?php

/**
 * This is the model class for table "sponsor".
 *
 * The followings are the available columns in table 'sponsor':
 * @property integer $Id
 * @property string $Name
 * @property string $Address
 * @property string $ContactNo
 *
 * The followings are the available model relations:
 * @property Allocation[] $allocations
 */
class Sponsor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sponsor';
	}

	public function GetSponsors()
	{
		return CHtml::listData(Sponsor::model()->findAll(),'Id','Name');
	}

	public function getSponsorNames()
	{
		$names = array();
		foreach(Sponsor::model()->findAll() as $sponsor)
		{
			array_push($names, $sponsor->Name);
		}
		return $names;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Address, ContactNo', 'required'),
			array('Name, SponsorCoordinator', 'length', 'max'=>45),
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
			'allocations' => array(self::HAS_MANY, 'Allocation', 'Sponsor_Id'),
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
			'SponsorCoordinator' => 'Sponsor Coordinator',
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
	 * @return Sponsor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
