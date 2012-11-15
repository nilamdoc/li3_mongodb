<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2012, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace app\controllers;
use app\models\users;
class QueriesController extends \lithium\action\Controller {

	public function index() {

	}
	public function original(){
		Users::remove();	
		$data = array('age'=>51,'name'=>'Nilam Doctor','user_id'=>1,'status'=>'C');
		$users = Users::create();
		$users->save($data);
		$data = array('age'=>49,'name'=>'Parimal Doctor','user_id'=>2,'status'=>'B');
		$users = Users::create();
		$users->save($data);		
		$data = array('age'=>32,'name'=>'Ruchi Jain','user_id'=>3,'status'=>'A');
		$users = Users::create();
		$users->save($data);
		$data = array('age'=>18,'name'=>'Hitarth Doctor','user_id'=>4,'status'=>'D');
		$users = Users::create();
		$users->save($data);		
		$users = Users::find('all');
		$this->render(array('head' => false,'template'=>'insert','data'=>compact('users','mysql','mongo','lithium')));


	}

	public function insert(){
		$users = Users::create();
		if (($this->request->data) && $users->save($this->request->data)) {
			
			$users = Users::find('all');
			$this->render(array('head' => false,'template'=>'insert','data'=>compact('users','mysql','mongo','lithium')));
		}

	}
	public function db_users_find(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "Users::find('all');";
		$users = Users::find('all');
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));

	}
	public function db_users_find_1(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "Users::find('all', array(
			'fields'=>array('_id','user_id','status')
		));";
		$users = Users::find('all', array(
			'fields'=>array('_id','user_id','status')
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_2(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	'fields'=>array('user_id','status','_id'=>0),
));";
		$users = Users::find('all', array(
			'fields'=>array('user_id','status','_id'=>0),
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_3(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	'conditions'=>array('status'=>'A'),
));";
		$users = Users::find('all', array(
			'conditions'=>array('status'=>'A'),
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_4(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	'fields'=>array('user_id','status','_id'=>0),
	'conditions'=>array('status'=>'A'),
));";
		$users = Users::find('all', array(
			'fields'=>array('user_id','status','_id'=>0),
			'conditions'=>array('status'=>'A'),
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_5(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	'conditions'=>array('status'=>array('\$ne'=>'A')),
));";
		$users = Users::find('all', array(
			'conditions'=>array('status'=>array('$ne'=>'A')),
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_6(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	'conditions'=>array('status'=>'A','age'=>50),
));		";
		$users = Users::find('all', array(
			'conditions'=>array('status'=>'A','age'=>50),
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_7(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	 'conditions' => array(
		'$or' => array(
			array('status' => 'A'),
			array('age' => 50)
		)
	)
));";
		$users = Users::find('all', array(
		   			 'conditions' => array(
        		    	'$or' => array(
                			array('status' => 'A'),
			                array('age' => 50)
						)
					)
				));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_8(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	 'conditions' => array(
		'age' => array('\$gt' => 25)
	)
));		
		";
		$users = Users::find('all', array(
		   			 'conditions' => array(
        		    	'age' => array('$gt' => 25)
					)
				));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_9(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	 'conditions' => array(
		'age' => array('\$lt' => 25)
	)
));		
		";
		$users = Users::find('all', array(
		   			 'conditions' => array(
        		    	'age' => array('$lt' => 25)
					)
				));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_10(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	 'conditions' => array(
		'age' => array('\$lt' => 50, '\$gt' => 25)
	)
));
";
		$users = Users::find('all', array(
		   			 'conditions' => array(
        		    	'age' => array('$lt' => 50, '$gt' => 25)
					)
				));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_11(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	 'conditions' => array(
		'name' => array('like'=>'/Pa/')
	)
));		
";
		$users = Users::find('all', array(
		   			 'conditions' => array(
        		    	'name' => array('like'=>'/Pa/')
					)
				));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_12(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	 'conditions' => array(
		'name' => array('like'=>'/^Ru/')
	)
));		
";
		$users = Users::find('all', array(
		   			 'conditions' => array(
        		    	'name' => array('like'=>'/^Ru/')
					)
				));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_13(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	'conditions'=>array('status'=>'A'),
	'order'=>array('user_id'=>'ASC')
));
";
		$users = Users::find('all', array(
			'conditions'=>array('status'=>'A'),
			'order'=>array('user_id'=>'ASC')
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_14(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('all', array(
	'conditions'=>array('status'=>'A'),
	'order'=>array('user_id'=>'DESC')
));
";
		$users = Users::find('all', array(
			'conditions'=>array('status'=>'A'),
			'order'=>array('user_id'=>'DESC')
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_15(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('count');		
or
Users::count();
";
		$users = Users::find('count');
		$this->render(array('head' => false,'template'=>'db_users_count','data'=>compact('users','mysql','mongo','lithium')));
	}
	public function db_users_find_16(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('count', array(
	'conditions'=>array('user_id'=> array('\$exists'=>true))
));		
";
		$users = Users::find('count', array(
			'conditions'=>array('user_id'=> array('$exists'=>true))
		));
		$this->render(array('head' => false,'template'=>'db_users_count','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_17(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::find('count', array(
	'conditions'=>array('age'=> array('\$gt'=>30))
));";
		$users = Users::find('count', array(
			'conditions'=>array('age'=> array('$gt'=>30))
		));
		$this->render(array('head' => false,'template'=>'db_users_count','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_18(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::connection()->connection->command(array(
	'distinct' => 'users',
	'key' => 'status',
));				
";
		$users = Users::connection()->connection->command(array(
    		'distinct' => 'users',
	    	'key' => 'status',
		));		
		$this->render(array('head' => false,'template'=>'db_users_distinct','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_19(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "Users::find('all', array(
	'limit'=>1
));";
		$users = Users::find('all', array(
			'limit'=>1
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_20(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "Users::find('all', array(
	'limit'=>1,
	'offset'=>2
));";
		$users = Users::find('all', array(
			'limit'=>1,
			'offset'=>2
		));
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_21(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
\$data = array('status'=>'C');
\$users = Users::find('all', array(
	 'conditions' => array(
		'age' => array('\$gt' => 25)
	)
))->save(\$data);			
		";
		
		$data = array('status'=>'C');
		$users = Users::find('all', array(
			 'conditions' => array(
				'age' => array('$gt' => 25)
			)
		))->save($data);			
		$users = Users::find('all', array(
			 'conditions' => array(
				'age' => array('$gt' => 25)
			)
		));					
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}


	public function db_users_find_22(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::update(
	array(
		'$inc' => array('age' => 3)
	),
	array('status' => 'A'),
	array('multi' => true)
	);
";
$data = array('$inc' => array('age' => 3));
		Users::update(
					array(
						'$inc' => array('age' => 3)
					),
					array('status' => 'A'),
					array('multi' => true)
					);
			$users = Users::find('all', array(
			 'conditions' => array(	'status' => 'A'),

		));					
		$this->render(array('head' => false,'template'=>'db_users_find','data'=>compact('users','mysql','mongo','lithium')));
	}

	public function db_users_find_23(){
		$mysql = $this->request->data['mysql'];
		$mongo = $this->request->data['mongo'];		
		$lithium = "
Users::remove(
	array('status'=>'D')
);
";
		Users::remove(
				array('status'=>'D')
					);
		$users = Users::find('all');
		$this->render(
			array('head' => false,'template'=>'db_users_find',
				  'data'=>compact('users','mysql','mongo','lithium')
				)
			);
	}


}

?>