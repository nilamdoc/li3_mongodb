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
		<th>Status</th>		
	</thead>
	<tbody>
	<?php 
	foreach ($users['values'] as $user){?>
		<tr>
		<td><?php print_r( $user);?></td>		
		</tr>
	<?php }?>
	</tbody>
</table>
