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
		<th>Cust_ID</th>
		<th>OrderDate</th>
		<th>Count/Total</th>
		
	</thead>
	<tbody>
<?php 
//print_r($orders['result']);
	foreach($orders['result'] as $o){
?><tr>
	<td><?=$o['_id'];?><?=$o['_id']['cust_id'];?></td>
	<td><?php 
	$date = $o['ord_date'];

	echo date('Y-M-d',$date->sec);?></td>				
	<td><?=$o['count'];?><?=$o['total'];?><?=$o['qty'];?></td>
  </tr>
		<?			}
		?>
	</tbody>
</table>
