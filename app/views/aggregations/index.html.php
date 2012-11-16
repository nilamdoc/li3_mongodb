<a href="queries">SQL to MongoDB </a>
<a href="aggregations"><strong>SQL to Aggregation</strong> </a>
<h5>Reference <a href="http://docs.mongodb.org/manual/reference/sql-aggregation-comparison/" target="_blank">http://docs.mongodb.org/manual/reference/sql-aggregation-comparison/</a></h5>
<div>
	<div style="float:left;width:48% ">
	<h4>Insert Records</h4>
	<?php
/*		echo $this->form->create('',array('url'=>'/aggregations/Insert'));
		
		echo $this->form->label('Name');	
		echo $this->form->input('name',array('placeholder'=>'any name'));
		echo $this->form->label('Age');
			$age = array(18=>18,19=>19,20=>20,21=>21,22=>22,50=>50,51=>51,60=>60);
		echo $this->form->select('age',$age);
		echo $this->form->label('User Id');	
		echo $this->form->input('user_id',array('placeholder'=>'any number'));
			$status = array('A'=>'A','B'=>'B','C'=>'C','D'=>'D');
		echo $this->form->label('Status');		
		echo $this->form->select('status',$status);		
		echo "";
		echo $this->form->submit('Insert');	
		echo $this->form->end();
*/		
	?>
	</div>
	<div style="float:left;width:48% ">
		<h4>Default records</h4>
		<?php	
		echo $this->form->create('',array('url'=>'/aggregations/Original'));
		?>
		One collection `orders` that contain documents of the following prototype:
		<pre>{
  cust_id: "abc123",
  ord_date: ISODate("2012-11-02T17:04:11.102Z"),
  status: 'A',
  price: 50,
  items: [ { sku: "xxx", qty: 25, price: 1 },
           { sku: "yyy", qty: 25, price: 1 } ]
}</pre>
<?php
		echo $this->form->submit('Insert');	
		echo $this->form->end();
		?>
	</div>
</div>
<div style="float:left ">
<h4>Aggeregate / Group Records</h4>
<table>
	<thead>
		<th>SQL SELECT Statements</th>
		<th>MongoDB find() Statements</th>
		<th>Description</th>		
		<th>Link</th>
	</thead>
	<tbody>
<?php
	$mysql = 'SELECT COUNT(*) AS count
FROM orders';
	$mongo = 'db.orders.aggregate( [
   { $group: { _id: null,
               count: { $sum: 1 } } }
] )';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>Count all records from orders</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT SUM(price) AS total
FROM orders';
	$mongo = 'db.orders.aggregate( [
{ $group: { _id: null,
	total: { $sum: "$price" } } }
] )';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>Sum the price field from orders</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_1'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id,
       SUM(price) AS total
FROM orders
GROUP BY cust_id
';
	$mongo = 'db.orders.aggregate( [
   { $group: { _id: "$cust_id",
               total: { $sum: "$price" } } }
] )
';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For each unique cust_id, sum the price field.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_2'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id,
       SUM(price) AS total
FROM orders
GROUP BY cust_id
ORDER BY total
';
	$mongo = 'db.orders.aggregate( [
   { $group: { _id: "$cust_id",
       total: { $sum: "$price" } } },
	   { $sort: { total: 1 } }			   
] )
';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For each unique cust_id, sum the price field, results sorted by sum.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_2'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id,
       ord_date,
       SUM(price) AS total
FROM orders
GROUP BY cust_id, ord_date
';
	$mongo = 'db.orders.aggregate( [
   { $group: { _id: { cust_id: "$cust_id",
                      ord_date: "$ord_date" },
               total: { $sum: "$price" } } }
] )
';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For each unique cust_id, sum the price field, results sorted by sum.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_3'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id, count(*)
FROM orders
GROUP BY cust_id
HAVING count(*) > 1
';
	$mongo = 'db.orders.aggregate( [
   { $group: { _id: "$cust_id",
               count: { $sum: 1 } } },
   { $match: { count: { $gt: 1 } } }
] )
';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For cust_id with multiple records, return the cust_id and the corresponding record count.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_4'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id,
       ord_date,
       SUM(price) AS total
FROM orders
GROUP BY cust_id, ord_date
HAVING total > 50
';
	$mongo = 'db.orders.aggregate( [
	{ $group: { _id: { cust_id: "$cust_id",
		ord_date: "$ord_date" },
		total: { $sum: "$price" } } },
	{ $match: { total: { $gt: 50 } } }
] )
';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For each unique cust_id, ord_date grouping, sum the price field and return only where the sum is greater than 50.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_5'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id,
       SUM(price) as total
FROM orders
WHERE status = \'A\'
GROUP BY cust_id
';
	$mongo = 'db.orders.aggregate( [
   { $match: { status: \'A\' } },
   { $group: { _id: "$cust_id",
               total: { $sum: "$price" } } }
] )

';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For each unique cust_id with status A, sum the price field.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_6'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id,
       SUM(price) as total
FROM orders
WHERE status = \'A\'
GROUP BY cust_id
HAVING total > 100';
	$mongo = 'db.orders.aggregate( [
   { $match: { status: \'A\' } },
   { $group: { _id: "$cust_id",
               total: { $sum: "$price" } } },
   { $match: { total: { $gt: 100 } } }
] )';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For each unique cust_id with status A, sum the price field and return only where the sum is greater than 100.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_7'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT cust_id,
       SUM(li.qty) as qty
FROM orders o,
     order_lineitem li
WHERE li.order_id = o.id
GROUP BY cust_id';
	$mongo = 'db.orders.aggregate( [
   { $unwind: "$items" },
   { $group: { _id: "$cust_id",
               qty: { $sum: "$items.qty" } } }
] )
';
?>
		<tr>
			<td><pre><?=$mysql?></pre></td>
			<td><pre><?=$mongo?></pre></td>
			<td>For each unique cust_id, sum the corresponding line item qty fields associated with the orders.</td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/aggregations/db_orders_find_8'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		

	</tbody>
</table>
</div>
