<h3>Query used in controller</h3>
<h4>MySQL:</h4>
<pre><?=$mysql?></pre>
<h4>Mongo:</h4>
<pre><?=$mongo?></pre>
<h3>Lithium: </h3>
<pre><?=$lithium?></pre>
<?php echo $this->html->link('<< back','/queries/')?>
<table>
	<thead>
		<th>Mongo ID</th>
		<th>Name</th>
		<th>User ID</th>		
		<th>Status</th>		
		<th>Age</th>				
	</thead>
	<tbody>
	<?php foreach ($users as $user){?>
		<tr>
		<td><?php echo $user->_id;?></td>
		<td><?php echo $user->name?></td>		
		<td><?php echo $user->user_id;?></td>				
		<td><?php echo $user->status;?></td>		
		<td><?php echo $user->age;?></td>				
		</tr>
	<?php }?>
	</tbody>
</table>
