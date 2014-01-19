<?php

/**
 * This is the model class for table "tbl_appointment".
 *
 * The followings are the available columns in table 'tbl_appointment':
 * @property integer $id
 * @property integer $patient
 * @property integer $doctor
 * @property string $date
 * @property string $time
 * @property string $location
 * @property string $comments
 * @property integer $create_user
 * @property string $create_time
 * @property integer $update_user
 * @property string $update_time
 * @property Patient $patient0
 */
class Appointment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Appointment the static model class
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
		return 'tbl_appointment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient, doctor, date, location, comments', 'required'),
			array('patient, doctor, create_user, update_user', 'numerical', 'integerOnly'=>true),
			array('location, comments', 'length', 'max'=>255),
			array('create_time, update_time, time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, patient, doctor, date, location, comments, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
			'patient0' => array(self::BELONGS_TO, 'Patient', 'patient'),
			'doctor0' => array(self::BELONGS_TO, 'Doctor', 'doctor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'patient' => 'Patient',
			'doctor' => 'Doctor',
			'date' => 'Date',
			'time'=>'Time',
			'location' => 'Location',
			'comments' => 'Comments',
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
		$criteria->compare('patient',$this->patient);
		$criteria->compare('doctor',$this->doctor);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('create_user',$this->create_user);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_user',$this->update_user);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}