<?php

/**
 * This is the model class for table "sys_table".
 *
 * The followings are the available columns in table 'sys_table':
 * @property integer $Id
 * @property string $FieldName
 * @property integer $Role_Id
 *
 * The followings are the available model relations:
 * @property Role $role
 */
class SysTable extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sys_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FieldName, Role_Id', 'required'),
			array('Role_Id', 'numerical', 'integerOnly'=>true),
			array('FieldName', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, FieldName, Role_Id', 'safe', 'on'=>'search'),
		);
	}*/

	public function IsVisible($fieldName,$roleId)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "FieldName=:FieldName AND Role_Id=:roleId";
		$criteria->params = array(':FieldName'=>$fieldName, ':roleId'=>$roleId);
		$query = SysTable::model()->find($criteria);
		if(!is_null($query)){
			return true;
		}
		return false;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'role' => array(self::BELONGS_TO, 'Role', 'Role_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'FieldName' => 'Field Name',
			'Role_Id' => 'Role',
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
		$criteria->compare('FieldName',$this->FieldName,true);
		$criteria->compare('Role_Id',$this->Role_Id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SysTable the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
