<a href="queries"><strong>SQL to MongoDB</strong> </a>
<a href="aggregations">SQL to Aggregation </a>
<h5>Reference <a href="http://docs.mongodb.org/manual/reference/sql-comparison/" target="_blank">http://docs.mongodb.org/manual/reference/sql-comparison/</a></h5>
<div>
	<div style="float:left;width:48% ">
	<h4>Insert Records</h4>
	<?php
		echo $this->form->create('',array('url'=>'/queries/Insert'));
		
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
		
	?>
	</div>
	<div style="float:left;width:48% ">
		<h4>Default records</h4>
		<?php	
		echo $this->form->create('',array('url'=>'/queries/Original'));
		?>
		Structure used for default records
		<pre>{
   "_id": ObjectId("50a361309d5d0c6c0c000001"),
   "age": NumberInt(50),
   "name": "Nilam Doctor",
   "status": "C",
   "user_id": NumberInt(1)
}</pre><br>
<?php
		echo $this->form->submit('Insert');	
		echo $this->form->end();
		?>
	</div>
</div>
<div style="float:left ">
<h4>Find Records</h4>
<table>
	<thead>
		<th>SQL SELECT Statements</th>
		<th>MongoDB find() Statements</th>
		<th>Link</th>
	</thead>
	<tbody>
<?php
	$mysql = 'SELECT * FROM users';
	$mongo = 'db.users.find()';
?>
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT id, user_id, status
FROM users';
	$mongo = 'db.users.find(
    { },
    { user_id: 1, status: 1 }
)';
?>
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_1'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = 'SELECT user_id, status
FROM users';
	$mongo = '
db.users.find(
    { },
    { user_id: 1, status: 1, _id: 0 }
)';
?>
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_2'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = '
SELECT *
	FROM users
	WHERE status = "A"';
	$mongo = '
db.users.find(
    { status: "A" }
)
';
?>
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_3'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = '
SELECT user_id, status
FROM users
WHERE status = "A"';
	$mongo = '
db.users.find(
    { status: "A" },
    { user_id: 1, status: 1, _id: 0 }
)';
?>		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_4'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE status != "A"';
	$mongo = '
db.users.find(
    { status: { $ne: "A" } }
)';
?>		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_5'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE status = "A"
AND age = 50';
	$mongo = '
db.users.find(
    { status: "A",
      age: 50 }
)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_6'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE status = "A"
OR age = 50';
	$mongo = '
db.users.find(
    { $or: [ { status: "A" } ,
             { age: 50 } ] }
)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_7'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE age > 25
';
	$mongo = '
db.users.find(
    { age: { $gt: 25 } }
)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_8'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE age < 25
';
	$mongo = '
db.users.find(
    { age: { $lt: 25 } }
)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_9'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE age > 25
AND   age <= 50
';
	$mongo = '
db.users.find(
   { age: { $gt: 25, $lte: 50 } }
)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_10'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE name like "%Pa%"
';
	$mongo = '
db.users.find(
   { name: /Pa/ }
)';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_11'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE name like "Ru%"
';
	$mongo = '
db.users.find(
   { name: /^Ru/ }
)';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_12'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE status = "A"
ORDER BY user_id ASC
';
	$mongo = '
db.users.find( { status: "A" } ).sort( { user_id: 1 } )
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_13'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
WHERE status = "A"
ORDER BY user_id DESC
';
	$mongo = '
db.users.find( { status: "A" } ).sort( { user_id: -1 } )
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_14'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT COUNT(*)
FROM users
';
	$mongo = '
db.users.count()
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_15'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT COUNT(user_id)
FROM users
';
	$mongo = '
db.users.count( { user_id: { $exists: true } } )
or
db.users.find( { user_id: { $exists: true } } ).count()
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_16'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT COUNT(*)
FROM users
WHERE age > 30
';
	$mongo = '
db.users.count( { age: { $gt: 30 } } )
or
db.users.find( { age: { $gt: 30 } } ).count()
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_17'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT DISTINCT(status)
FROM users
';
	$mongo = '
db.users.distinct( "status" )';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_18'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
LIMIT 1
';
	$mongo = '
db.users.findOne()

or

db.users.find().limit(1)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_19'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
SELECT *
FROM users
LIMIT 1
SKIP 2
';
	$mongo = '
db.users.find().limit(1).skip(2)';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_20'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		

	</tbody>
</table>

<h4>Update Records</h4>
<table>
	<thead>
		<th>SQL SELECT Statements</th>
		<th>MongoDB find() Statements</th>
		<th>Link</th>
	</thead>
	<tbody>
<?php
	$mysql = '
UPDATE users
SET status = "C"
WHERE age > 25
';
	$mongo = '
db.users.update(
   { age: { $gt: 25 } },
   { $set: { status: "C" } },
   { multi: true }
)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_21'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
<?php
	$mysql = '
UPDATE users
SET age = age + 3
WHERE status = "A"
';
	$mongo = '
db.users.update(
   { status: "A" } ,
   { $inc: { age: 3 } },
   { multi: true }
)
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_22'));
				echo $this->form->submit('Check');
				echo $this->form->hidden('mysql',array('value'=>$mysql));
				echo $this->form->hidden('mongo',array('value'=>$mongo));
				echo $this->form->end();
			?>
			</td>		
		</tr>		
	</tbody>
</table>

<h4>Delete Records</h4>
<table>
	<thead>
		<th>SQL SELECT Statements</th>
		<th>MongoDB find() Statements</th>
		<th>Link</th>
	</thead>
	<tbody>
<?php
	$mysql = '
DELETE FROM users
WHERE status = "D"
';
	$mongo = '
db.users.remove( { status: "D" } )
';
?>		
		<tr>
			<td><?=$mysql?></td>
			<td><?=$mongo?></td>
			<td>
			<?php
				echo $this->form->create('',array('url'=>'/queries/db_users_find_23'));
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