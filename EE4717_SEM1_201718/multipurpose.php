<?php

	
	//DB credentials
	$servername="localhost";
	$dbusername="myuser";
	$dbpassword="xxxx";
	$dbname="201718";
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);


	//DB insert order
	if(isset($_GET['operation_num'])){
		if($_GET['operation_num']==1){
			$update="update books set qty_sold= qty_sold+".$_GET['qty_ordered']." where books_id=".$_GET['books_id'];
			echo $update."<br>";
			$insert="insert into purchase_history ('books_id','user_id,'qty_sold') values (".$_GET['books_id'].",".$_GET['user_id'].",".$_GET['qty_ordered'].")";
			echo $insert."<br>";
			unset($update);
			unset($insert);
		}else if($_GET['operation_num']==2){
			$search="select * from books where ".$_GET['search_type']." like '%".$_GET['search_term']."%'";
			$searchresults=$conn->query($search);
		}else if($_GET['operation_num']==3){
			$update= "update books set price=".$_GET['updateprice']." where books_id=".$_GET['books_id'];
			$conn->query($update);
			echo $update;
		}
	}

	//DB query
	$query= "select * from books";
	@$result=$conn->query($query);
	$num_rows=$result->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Sales</title>
</head>
<body>
	<fieldset>
		<legend>Purchase book</legend>
		<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="number" name='operation_num' style="display:none;" value=1>
		<input type="text" name="user_id" placeholder="<user_id>" required><br>
		<select name='books_id' required>
			<?php
				for($i=0;$i<$num_rows;$i++){
					$row=$result->fetch_assoc();
					echo "<option value='".$row['books_id']."'>";
					echo $row['title'];
					echo "</option>";
				}
			?>
		</select><br>
		<input type="number" name="qty_ordered" placeholder="<qty_ordered>" required><br>
		<input type="submit" value="Submit Order" required>
	</form>
	</fieldset>
	<fieldset>
		<legend>Search Book</legend>
		<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="number" name='operation_num' style="display:none;" value=2>	
		<select name='search_type'>
			<option value='title'>
				Title
			</option>
			<option value='author'>
				Author
			</option>
			<option value='price'>
				Price
			</option>
		</select>
		<input type="text" name="search_term" placeholder="enter search term">
		<input type="submit" value="Search" required>
	</form>
	</fieldset>
	<fieldset>
		<legend>Results</legend>
		
		<?php
			if(isset($searchresults)){
				for($i=0;$i<$searchresults->num_rows;$i++){
					$row=$searchresults->fetch_assoc();
					echo "<form method='GET' action=".$_SERVER['PHP_SELF'].">";
					echo "<input type='number' name='operation_num' style='display:none;' value=3>";
					echo "<input type='text' name='books_id' style='display:none;' value='".$row["books_id"]."''>";
					echo "<table>";
					echo "<tr><td>Title: ".$row['title']."<td></tr>";
					echo "<tr><td>ISBN: ".$row['isbn']."<td></tr>";
					echo "<tr><td>ISBN: ".$row['author']."<td></tr>";
					echo "<tr><td>Price: ".$row['price']."<td><td><input name='updateprice' type='number' required></td><td><input type='submit' value='Update'></td>";
					echo "<td></td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";

				}
			}
			
		?>
	
	</fieldset>
	
</body>
</html>