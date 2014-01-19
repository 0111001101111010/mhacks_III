<?php

/**
 * This is the model class for table "tbl_doctor".
 *
 * The followings are the available columns in table 'tbl_doctor':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $address
 * @property string $city
 * @property integer $state
 * @property integer $zip_code
 * @property integer $create_user
 * @property string $create_time
 * @property integer $update_user
 * @property string $update_time
 * @property Appointment[] appointments 
 */
class Doctor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Doctor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_doctor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, phone_number, email, address, city, state, zip_code', 'required'),
			array('state, zip_code, create_user, update_user', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, phone_number, email, address, city', 'length', 'max'=>255),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, phone_number, email, address, city, state, zip_code, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
			'appointments'=>array(self::HAS_MANY, 'Appointment', 'doctor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone_number' => 'Phone Number',
			'email' => 'Email',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'zip_code' => 'Zip Code',
			'create_user' => 'Create User',
			'create_time' => 'Create Time',
			'update_user' => 'Update User',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('create_user',$this->create_user);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_user',$this->update_user);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}