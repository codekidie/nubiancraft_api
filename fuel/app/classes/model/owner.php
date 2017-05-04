<?php
use Orm\Model;

class Model_Owner extends Model
{
	protected static $_properties = array(
		'id',
		'firstname',
		'lastname',
		'phone',
		'username',
		'password',
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
		$val->add_field('firstname', 'Firstname', 'max_length[255]');
		$val->add_field('lastname', 'Lastname', 'max_length[255]');
		$val->add_field('phone', 'Phone', 'max_length[255]');
		$val->add_field('username', 'Username', 'max_length[255]');
		$val->add_field('password', 'Password', 'max_length[255]');

		return $val;
	}

}
