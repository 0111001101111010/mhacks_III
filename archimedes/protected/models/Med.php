<?php

/**
 * This is the model class for table "tbl_med".
 *
 * The followings are the available columns in table 'tbl_med':
 * @property integer $id
 * @property string $brand
 * @property string $name
 * @property string $administration_type
 * @property string $type
 * @property string $dosage
 * @property string $frequency
 * @property integer $intervals
 * @property integer $create_user
 * @property string $create_time
 * @property integer $update_user
 * @property string $update_time
 */
class Med extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Med the static model class
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
		return 'tbl_med';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, administration_type, type, dosage, frequency, intervals', 'required'),
			array('intervals, create_user, update_user', 'numerical', 'integerOnly'=>true),
			array('brand, name, administration_type, type, dosage, frequency', 'length', 'max'=>255),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, brand, name, administration_type, type, dosage, frequency, intervals, create_user, create_time, update_user, update_time', 'safe', 'on'=>'search'),
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
			'patients'=>array(self::MANY_MANY, 'Patient',
                'tbl_patient_med_assignment(med_id, patient_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'brand' => 'Brand',
			'name' => 'Name',
			'administration_type' => 'Administration Type',
			'type' => 'Type',
			'dosage' => 'Dosage',
			'frequency' => 'Frequency',
			'intervals' => 'Intervals',
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
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('administration_type',$this->administration_type,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('dosage',$this->dosage,true);
		$criteria->compare('frequency',$this->frequency,true);
		$criteria->compare('intervals',$this->intervals);
		$criteria->compare('create_user',$this->create_user);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_user',$this->update_user);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}