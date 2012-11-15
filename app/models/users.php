<?php

namespace app\models;

class Users extends \lithium\data\Model {
	public $_meta = array('connection' => 'default',array(
		'key' => '_id',
		'locked' => true
		));
	public $validates = array();

	protected $_schema = array(
		'_id'	=>	array('type' => 'id'),
		'name'	=>	array('type' => 'string', 'null' => false),
		'age'	=>	array('type' => 'integer', 'null' => false),		
		'user_id'	=>	array('type' => 'integer', 'null' => false),				
		'status'	=>	array('type' => 'string', 'null' => false),				
		'date'	=>	array('type' => 'date', 'null' => false),						
	);

}

?>