<?php

/**
 * This is the model class for table "allocation".
 *
 * The followings are the available columns in table 'allocation':
 * @property integer $id
 * @property string $TuitionFee
 * @property string $Miscellaneous
 * @property string $Others
 * @property integer $Timeline_Id
 * @property integer $Application_Id
 * @property integer $Sponsor_Id
 *
 * The followings are the available model relations:
 * @property Timeline $timeline
 * @property Application $application
 * @property Sponsor $sponsor
 */
class Allocation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'allocation';
	}

	public function getTotalTuitionFee($applicationId)
	{
		$allocations = Allocation::model()->findAll('Application_Id='.$applicationId);
		$total = 0;
		foreach($allocations as $allocation)
                $total+=($allocation->TuitionFee + $allocation->Miscellaneous + $allocation->Others);
        return $total;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Sponsor_Id', 'required','on'=>'student'),
			array('TuitionFee, Miscellaneous, Others,', 'required','on'=>'created'),
			array('Timeline_Id, Application_Id, Sponsor_Id', 'numerical', 'integerOnly'=>true),
			array('TuitionFee, Miscellaneous, Others', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, TuitionFee, Miscellaneous, Others, Timeline_Id, Application_Id, Sponsor_Id', 'safe', 'on'=>'search'),
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
			'sponsor' => array(self::BELONGS_TO, 'Sponsor', 'Sponsor_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'TuitionFee' => 'Tuition Fee',
			'Miscellaneous' => 'Miscellaneous',
			'Others' => 'Others',
			'Timeline_Id' => 'Timeline',
			'Application_Id' => 'Application',
			'Sponsor_Id' => 'Sponsor',
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
	public function search($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('TuitionFee',$this->TuitionFee,true);
		$criteria->compare('Miscellaneous',$this->Miscellaneous,true);
		$criteria->compare('Others',$this->Others,true);
		$criteria->compare('Timeline_Id',$this->Timeline_Id);
		$criteria->compare('Application_Id',$this->Application_Id);
		$criteria->compare('Sponsor_Id',$this->Sponsor_Id);
		$criteria->condition = "Application_Id=:id";
		$criteria->params = array(':id'=>$id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Allocation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
