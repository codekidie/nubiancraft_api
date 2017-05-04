<?php
use Orm\Model;

class Model_Material extends Model
{
	protected static $_properties = array(
		'id',
		'materialname',
		'materialimage',
		'laborcost',
		'weight',
		'gemsize',
		'type',
		'numberofgems',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('materialname', 'Materialname', 'max_length[255]');
		$val->add_field('materialimage', 'Materialimage', 'max_length[255]');
		$val->add_field('material', 'Material', '');
		$val->add_field('cost', 'Cost', 'valid_string[numeric]');

		return $val;
	}

}
