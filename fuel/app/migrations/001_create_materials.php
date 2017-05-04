<?php

namespace Fuel\Migrations;

class Create_materials
{
	public function up()
	{
		\DBUtil::create_table('materials', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'materialname' => array('constraint' => 255, 'type' => 'varchar'),
			'materialimage' => array('constraint' => 255, 'type' => 'varchar'),
			'material' => array('type' => 'type', 'string' => true),
			'cost' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('materials');
	}
}