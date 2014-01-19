<?php

class m140118_041229_create_initial_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable("tbl_patient",
			array(
				"id"=>"pk",
				"user_specific_client"=>"string NULL",
				"first_name"=>"string NOT NULL",
				"last_name"=>"string NOT NULL",
				"phone_number"=>"string NOT NULL",
				"email"=>"string DEFAULT NULL",
				"address"=>"string NOT NULL",
				"city"=>"string NOT NULL",
				"state"=>"int(11) NOT NULL",
				"zip_code"=>"int(5) NOT NULL",
				"create_user"=>"int(11) DEFAULT NULL",
				"create_time"=>"datetime DEFAULT NULL",
				"update_user"=>"int(11) DEFAULT NULL",
				"update_time"=>"datetime DEFAULT NULL",

			));

		$this->createTable("tbl_caretaker",
			array(
				'id'=>'pk',
				'first_name'=>'string NOT NULL',
				'last_name'=>'string NOT NULL',
				'username'=>'string NOT NULL',
				'password'=>'string NOT NULL',
				'phone_number'=>'string NOT NULL',
				'email'=>'string NOT NULL',
				'address'=>'string NOT NULL',
				"city"=>"string NOT NULL",
				"state"=>"int(11) NOT NULL",
				"zip_code"=>"int(5) NOT NULL",
				"create_user"=>"int(11) DEFAULT NULL",
				"create_time"=>"datetime DEFAULT NULL",
				"update_user"=>"int(11) DEFAULT NULL",
				"update_time"=>"datetime DEFAULT NULL",
			));

		$this->createTable("tbl_user",
			array(
				"id"=>"pk",
				'first_name'=>'string NOT NULL',
				'last_name'=>'string NOT NULL',
				'username'=>'string NOT NULL',
				'password'=>'string NOT NULL',
				"email"=>"string NOT NULL",
			));
		$this->createTable("tbl_med", array(
			"id"=>"pk",
			"brand"=>"string DEFAULT NULL",
			"name"=>"string NOT NULL",
			"administration_type"=>"string NOT NULL",
			"type"=>"string NOT NULL",
			"dosage"=>"string NOT NULL",
			"frequency"=>"string NOT NULL",
			"intervals"=>"int(4) NOT NULL",
			"create_user"=>"int(11) DEFAULT NULL",
			"create_time"=>"datetime DEFAULT NULL",
			"update_user"=>"int(11) DEFAULT NULL",
			"update_time"=>"datetime DEFAULT NULL",
		));
		$this->createTable("tbl_doctor", array(
			'id'=>'pk',
			'first_name'=>'string NOT NULL',
			'last_name'=>'string NOT NULL',
			'phone_number'=>'string NOT NULL',
			'email'=>'string NOT NULL',
			'address'=>'string NOT NULL',
			"city"=>"string NOT NULL",
			"state"=>"int(11) NOT NULL",
			"zip_code"=>"int(5) NOT NULL",
			"create_user"=>"int(11) DEFAULT NULL",
			"create_time"=>"datetime DEFAULT NULL",
			"update_user"=>"int(11) DEFAULT NULL",
			"update_time"=>"datetime DEFAULT NULL",
		));
		$this->createTable("tbl_appointment", 
			array(
				"id"=>"pk",
				"patient"=>"int(11) NOT NULL",
				"doctor"=>"int(11) NOT NULL",
				"date"=>"datetime NOT NULL",
				"location"=>"string NOT NULL",
				"comments"=>"string NOT NULL",
				"create_user"=>"int(11) DEFAULT NULL",
				"create_time"=>"datetime DEFAULT NULL",
				"update_user"=>"int(11) DEFAULT NULL",
				"update_time"=>"datetime DEFAULT NULL",
			));
		$this->createTable("tbl_patient_med_assignment", array(
			"patient_id"=>"int(11) NOT NULL",
			"med_id"=>"int(11) NOT NULL",
		));
		$this->createTable("tbl_caretaker_patient_assignment", array(
			"caretaker_id"=>"int(11) NOT NULL",
			"patient_id"=>"int(11) NOT NULL",
		));

		$this->createTable("tbl_state", array(
			"id"=>"pk",
			"name"=>"string NOT NULL",
			"abbreviation"=>"string NOT NULL",
		));




	}

	public function down()
	{
		echo "m140118_041229_create_initial_tables does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}