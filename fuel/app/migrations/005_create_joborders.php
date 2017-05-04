<?php

namespace Fuel\Migrations;

class Create_joborders
{
	public function up()
	{
		\DBUtil::create_table('joborders', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'address' => array('constraint' => 255, 'type' => 'varchar'),
			'date' => array('constraint' => 255, 'type' => 'varchar'),
			'amount' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'deposit' => array('constraint' => 255, 'type' => 'varchar'),
			'balance' => array('constraint' => 255, 'type' => 'varchar'),
			'conform' => array('constraint' => 255, 'type' => 'varchar'),
			'recievedby' => array('constraint' => 255, 'type' => 'varchar'),
			'claimedby' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('joborders');
	}
}