<h3>Query used in controller</h3>
<h4>MySQL:</h4>
<pre><?=$mysql?></pre>
<h4>Mongo:</h4>
<pre><?=$mongo?></pre>
<h3>Lithium: </h3>
<pre><?=$lithium?></pre>
<?php echo $this->html->link('<< back','/aggregations/')?>
<table>
	<thead>
		<th>Mongo ID</th>
		<th>Cust_id</th>
		<th>Ord_Date</th>		
		<th>Status</th>		
		<th>Price</th>		
		<th>Items</th>				
	</thead>
	<tbody>
	<?php foreach ($orders as $order){?>
		<tr>
		<td><?php echo $order->_id;?></td>
		<td><?php echo $order->cust_id?></td>		
		<td><?php echo date('Y-M-d',$order->ord_date->sec);?></td>		
		<td><?php echo $order->status;?></td>		
		<td><?php echo $order->price;?></td>				
		</tr>
	<?php }?>
	</tbody>
</table>
