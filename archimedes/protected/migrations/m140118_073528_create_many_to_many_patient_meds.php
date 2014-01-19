<?php

class m140118_073528_create_many_to_many_patient_meds extends CDbMigration
{
	public function up()
	{
		$this->createTable("tbl_patient_med_assignment", array(
			"patient_id"=>"int(11) NOT NULL",
			"med_id"=>"int(11) NOT NULL",
			'PRIMARY KEY(`patient_id`, `med_id`)',
		));
		$this->createTable("tbl_caretaker_patient_assignment", array(
			"caretaker_id"=>"int(11) NOT NULL",
			"patient_id"=>"int(11) NOT NULL",
			'PRIMARY KEY(`caretaker_id`, `patient_id`)',
		));

	}

	public function down()
	{
		echo "m140118_073528_create_many_to_many_patient_meds does not support migration down.\n";
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