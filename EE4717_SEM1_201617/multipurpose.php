<?php  
	//DB credentials
	$servername="localhost";
	$dbusername="myuser";
	$dbpassword="xxxx";
	$dbname="201617";
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	//Operations (Switch)
	if(isset($_GET['operation_num'])){
		if($_GET['operation_num']==1){
			$insert="insert into `rft`(`rft_id`, `itb_id`, `users_id`, `title`, `sector`, `scope`, `description`) values (".$_GET['rft_id'].",0,".$_GET['users_id'].",'".$_GET['title']."','".$_GET['sector']."','".$_GET['scope']."','".$_GET['description']."')";
			echo $insert;
			$conn->query($insert);
		}else if($_GET['operation_num']==2){
			$insert="insert into `itb`(`itb_id`, `rft_id`, `users_id`, `cost`, `duration`, `warranty`) values (".$_GET['itb_id'].",".$_GET['rft_id'].",".$_GET['users_id'].",".$_GET['cost'].",".$_GET['duration'].",".$_GET['warranty'].")";
			echo $insert;
			$conn->query($insert);
		}
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Multipurpose page</title>
</head>
<body>
	<fieldset>
		<legend>Insert New RFT</legend>
		<form method='GET' action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input type="number" name="operation_num" style="display:none" value=1>
			UserID: <input type="text" name="users_id" placeholder="users_id" required value="3000"><br>
			RftID: <input type="text" name="rft_id" placeholder="rft_id" required value="9020"><br>
			Title: <input type="text" name="title" placeholder="title" required value="Make US great again"><br>
			Sector: <input type="text" name="sector" placeholder="sector" required value="Financial"><br>
			Scope: <input type="text" name="scope" placeholder="scope" required value="Economy"><br>
			Description: <input type="text" name="description" placeholder="description" required value="Build a whole new different world"><br>
			<input type="submit" value="Insert new RFT">
		</form>
	</fieldset>
	<fieldset>
		<legend>Insert New ITB</legend>
		<form method='GET' action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input type="number" name="operation_num" style="display:none" value=2>
			UserID: <input type="text" name="users_id" placeholder="users_id" required value="3002"><br>
			ItbID: <input type="text" name="itb_id" placeholder="rft_id" required value="8020"><br>
			RftID: 
			<select name='rft_id'>
				<?php
					$query= "select * from rft";
					@$results=$conn->query($query);
					for($i=0;$i<$results->num_rows;$i++){
						$row=$results->fetch_assoc();
						echo "<option value=".$row['rft_id'].">".$row['title']."</option>";
					}
				?>
			</select><br>
			Cost: $<input type="text" name="cost" placeholder="cost" required value=2000><br>
			Duration: <input type="number" name="duration" placeholder="sector" required value=364> days<br>
			Warranty: <input type="number" name="warranty" placeholder="scope" required value=300> days<br>
			<input type="submit" value="Insert new ITB">
		</form>
	</fieldset><br>
	<div style="border:1px solid black;width:100%;height:300px">
		<table border="1px">
			<tr>
				<th>TenderID</th>
				<th>Title</th>
				<th>Sector</th>
				<th>Scope</th>
				<th>Desciption</th>
			</tr>
			<?php
				$query="select * from rft";
				@$result=$conn->query($query);
				for($i=0;$i<@$result->num_rows;$i++){
					$row=$result->fetch_assoc();
					echo "<tr><td>".$row['rft_id']."</td>"."<td>".$row['title']."</td>"."<td>".$row['sector']."</td>"."<td>".$row['scope']."</td>"."<td>".$row['description']."</td>";
				}
			?>
		</table>
	</div>
	<div>
		<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Enter any sql statement here <input type="text" name="mysql" value='select * from itb'>
			<input type="submit" value="Execute SQL"><br>
			<?php 
					echo "<table border='1px'>";
					@$result=$conn->query($_GET['mysql']);
					for($i=0;$i<@$result->num_rows;$i++){
						$row=$result->fetch_assoc();
						echo "<tr>";
						foreach ($row as $key => $value) {
							echo "<td>".$value."</td>";
						}
						echo "</tr>";
					}
					echo "</table>";

			?>

		</form>
	</div>
</body>
</html>