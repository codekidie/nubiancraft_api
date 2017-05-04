<?php
use Orm\Model;

class Model_Joborder extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'address',
		'date_schedule',
		'amount',
		'deposit',
		'balance',
		'metalselection',
		'gemselection',
		'laborcost',
		'weight',
		'telnum',
		'numberofgems',
		'materialname',
		'materialimage',
		'created_at',
		'updated_at',
		'status',
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
		$val->add_field('name', 'Name', 'max_length[255]');
		$val->add_field('address', 'Address', 'max_length[255]');
		$val->add_field('date_schedule', 'Date', 'max_length[255]');
		$val->add_field('amount', 'Amount', 'max_length[255]');
		$val->add_field('deposit', 'Deposit', 'max_length[255]');
		$val->add_field('balance', 'Balance', 'max_length[255]');

		return $val;
	}

}
