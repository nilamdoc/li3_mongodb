<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2012, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace app\controllers;

use app\models\orders;
use lithium\data\Connections;

class AggregationsController extends \lithium\action\Controller {

	public function index() {

	}

	public function db_orders_find(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
  'aggregate' => 'orders',
  'pipeline' => 
    array( 
	  array( '\$group' => array( '_id' => null,
		'count' => array( '\$sum' => 1)  
		)
	  )
    )
 )
);";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			"pipeline" => 
                    array( 
                        array( '$group' => array( "_id" => null,
                                    'count' => array( '$sum' => 1)  
                                )
                            )
                    )
			
			)
		);


		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}
	
		public function db_orders_find_1(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
  'aggregate' => 'orders',
  'pipeline' => 
    array( 
	  array( '\$group' => array( '_id' => null,
		'total' => array( '\$sum' => 1)  
		)
	  )
    )
 )
);";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			"pipeline" => 
                    array( 
                        array( '$group' => array( "_id" => null,
                                    'total' => array( '$sum' => '$price')  
                                )
                            )
                    )
			
			)
		);


		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}
	
		public function db_orders_find_2(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
  'aggregate' => 'orders',
  'pipeline' => array( 
    array( 
      '\$group' => array( 
        '_id' => '\$cust_id',
        'total' => array( '\$sum' => '\$price') ,
      ),
    ),
  array('\$sort' => array( 'total' => 1))
  )
));";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			'pipeline' => 
                    array( 
                        array( 
							'$group' => array( 
								'_id' => '$cust_id',
                            	'total' => array( '$sum' => '$price') ,
                             ),
                          ),
   						array('$sort' => array( 'total' => 1))
                    )
			)
		);
		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}

		public function db_orders_find_3(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
  'aggregate' => 'orders',
  'pipeline' => array( 
    array( 
      '\$group' => array( 
        '_id' => array('cust_id'=>'\$cust_id','ord_date'=>'\$ord_date'),
      'total' => array( '\$sum' => '\$price') ,
        ),
      ),
    )
));		
";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			'pipeline' => 
                    array( 
                        array( 
							'$group' => array( 
								'_id' => array('cust_id'=>'$cust_id','ord_date'=>'$ord_date'),
                            	'total' => array( '$sum' => '$price') ,
                             ),
                          ),
                    )
			)
		);
		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}
	
	public function db_orders_find_4(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
  'aggregate' => 'orders',
  'pipeline' => array( 
     array( 
      '\$group' => array( 
        '_id'=>'\$cust_id',
        'count' => array('\$sum' => 1)),
      ),
     array('\$match'=>array('count'=>array('\$gt'=>1)))
   )
));
";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			'pipeline' => 
                    array( 
                        array( 
							'$group' => array( 
								'_id'=>'$cust_id',
								'count' => array('$sum' => 1)),
                            ),
						array('$match'=>array('count'=>array('$gt'=>1)))
                    )
			)
		);
		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}
	public function db_orders_find_5(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
	'aggregate' => 'orders',
	'pipeline' => 
		array( 
			array( 
				'\$group' => array( 
					'_id'=>array('cust_id'=>'\$cust_id','ord_date'=>'\$ord_date'),
					'total' => array('\$sum' => '\$price')),
				),
			array('\$match'=>array('total'=>array('\$gt'=>50)))
		)
	)
);
";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			'pipeline' => 
                    array( 
                        array( 
							'$group' => array( 
								'_id'=>array('cust_id'=>'$cust_id','ord_date'=>'$ord_date'),
								'total' => array('$sum' => '$price')),
                            ),
						array('$match'=>array('total'=>array('$gt'=>50)))
                    )
			)
		);
		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}

	public function db_orders_find_6(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
	'aggregate' => 'orders',
	'pipeline' => 
		array( 
			array('\$match'=>array('status'=>'A')),
			array( 
			'\$group' => array( 
				'_id'=>'$cust_id',
				'total' => array('\$sum' => '\$price')),
			)
		)
	)
);
";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			'pipeline' => 
                    array( 
						array('$match'=>array('status'=>'A')),
                        array( 
							'$group' => array( 
								'_id'=>'$cust_id',
								'total' => array('$sum' => '$price')),
                            )
                    )
			)
		);
		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}
	public function db_orders_find_7(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
\$mongodb = Connections::get('default')->connection;
\$orders = Orders::connection()->connection->command(array(
	'aggregate' => 'orders',
	'pipeline' => 
			array( 
				array('\$match'=>array('status'=>'A')),
				array( 
					'\$group' => array( 
						'_id'=>'\$cust_id',
						'total' => array('\$sum' => '\$price')),
					),
				array('\$match'=>array('total'=>array('\$gt'=>100)))
			)
		)
	);
";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			'pipeline' => 
                    array( 
						array('$match'=>array('status'=>'A')),
                        array( 
							'$group' => array( 
								'_id'=>'$cust_id',
								'total' => array('$sum' => '$price')),
                            ),
						array('$match'=>array('total'=>array('$gt'=>100)))
                    )
			)
		);
		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}	
		public function db_orders_find_8(){
		
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
";
		$mongodb = Connections::get('default')->connection;
		$orders = Orders::connection()->connection->command(array(
    		'aggregate' => 'orders',
			'pipeline' => 
                    array( 
						array('$unwind'=>'$items'),
                        array( 
							'$group' => array( 
								'_id'=>'$cust_id',
								'qty' => array('$sum' => '$items.qty')),
                            )
                    )
			)
		);
		$this->render(array('head' => false,'template'=>'db_orders_count','data'=>compact('orders','mysql','mongo','lithium')));
	}	
}