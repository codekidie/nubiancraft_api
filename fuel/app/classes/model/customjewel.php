<?php
use Orm\Model;

class Model_Customjewel extends Model
{
	protected static $_properties = array(
		'id',
		'materialname',
		'embed',
		'laborcost',
		'weight',
		'gemsize',
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
		$val->add_field('embed', 'Embed', 'max_length[255]');
		$val->add_field('laborcost', 'Laborcost', 'max_length[255]');
		$val->add_field('weight', 'Weight', 'max_length[255]');
		$val->add_field('gemsize', 'Gemsize', 'max_length[255]');
		$val->add_field('numberofgems', 'Numberofgems', 'max_length[255]');

		return $val;
	}

}
