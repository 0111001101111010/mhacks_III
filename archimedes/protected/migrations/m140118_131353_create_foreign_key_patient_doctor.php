<?php

class m140118_131353_create_foreign_key_patient_doctor extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey("fk_patient_doctor", "tbl_patient", "doctor", "tbl_doctor", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
		echo "m140118_131353_create_foreign_key_patient_doctor does not support migration down.\n";
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