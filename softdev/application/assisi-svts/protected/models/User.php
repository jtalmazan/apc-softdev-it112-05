<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $Id
 * @property string $Username
 * @property string $Password
 * @property integer $Profile_Id
 * @property integer $Role_Id
 *
 * The followings are the available model relations:
 * @property Application[] $applications
 * @property Partnerschool[] $partnerschools
 * @property Profile $profile
 * @property Role $role
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Username, Profile_Id, Role_Id', 'required'),
			array('Profile_Id, Role_Id', 'numerical', 'integerOnly'=>true),
			array('Username', 'length', 'max'=>45),
			array('Password', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Username, Password, Profile_Id, Role_Id', 'safe', 'on'=>'search'),
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
			'applications' => array(self::HAS_MANY, 'Application', 'User_Id'),
			'partnerschools' => array(self::HAS_MANY, 'Partnerschool', 'User_Id'),
			'profile' => array(self::BELONGS_TO, 'Profile', 'Profile_Id'),
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
			'Username' => 'Username',
			'Password' => 'Password',
			'Profile_Id' => 'Profile',
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
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Profile_Id',$this->Profile_Id);
		$criteria->compare('Role_Id',$this->Role_Id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
