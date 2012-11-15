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
		<th>Count</th>
	</thead>
	<tbody>
		<tr>
		<td><?php echo $users;?></td>
		</tr>
	</tbody>
</table>
