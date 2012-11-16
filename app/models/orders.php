<?php

namespace app\models;

class Orders extends \lithium\data\Model {
	public $_meta = array('connection' => 'default',array(
		'key' => '_id',
		'locked' => true
		));
	public $validates = array();

	protected $_schema = array(
		'_id'	=>	array('type' => 'id'),
		'cust_id'	=>	array('type' => 'string', 'null' => false),
		'ord_date'	=>	array('type' => 'date', 'null' => false),		
		'price'	=>	array('type' => 'integer', 'null' => false),				
		'status'	=>	array('type' => 'string', 'null' => false),				
		'date'	=>	array('type' => 'date', 'null' => false),						

	);

}

?>