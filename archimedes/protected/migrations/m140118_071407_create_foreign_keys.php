<?php

class m140118_071407_create_foreign_keys extends CDbMigration
{
	public function up()
	{

		$this->addForeignKey("fk_patient_update_user", "tbl_patient", "update_user", "tbl_user", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_caretaker_state", "tbl_caretaker", "state", "tbl_state", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_caretaker_create_user", "tbl_caretaker", "create_user", "tbl_user", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_caretaker_update_user", "tbl_caretaker", "update_user", "tbl_user", "id", "CASCADE", "RESTRICT");

		$this->addForeignKey("fk_med_create_user", "tbl_med", "create_user", "tbl_user", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_med_update_user", "tbl_med", "update_user", "tbl_user", "id", "CASCADE", "RESTRICT");

		$this->addForeignKey("fk_appointment_patient", "tbl_appointment", "patient", "tbl_patient", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_appointment_doctor", "tbl_appointment", "doctor", "tbl_doctor", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_appointment_create_user", "tbl_appointment", "create_user", "tbl_user", "id", "CASCADE", "RESTRICT");
		$this->addForeignKey("fk_appointment_update_user", "tbl_appointment", "update_user", "tbl_user", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
		echo "m140118_071407_create_foreign_keys does not support migration down.\n";
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