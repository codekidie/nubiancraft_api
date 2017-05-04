<?php

namespace Fuel\Migrations;

class Create_customjewels
{
	public function up()
	{
		\DBUtil::create_table('customjewels', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'materialname' => array('constraint' => 255, 'type' => 'varchar'),
			'embed' => array('constraint' => 255, 'type' => 'varchar'),
			'laborcost' => array('constraint' => 255, 'type' => 'varchar'),
			'weight' => array('constraint' => 255, 'type' => 'varchar'),
			'gemsize' => array('constraint' => 255, 'type' => 'varchar'),
			'numberofgems' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('customjewels');
	}
}