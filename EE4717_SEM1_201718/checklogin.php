<?php  
	//DB credentials
	$servername="localhost";
	$dbusername="myuser";
	$dbpassword="xxxx";
	$dbname="201718";
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	$query= "select * from users where username='".$_POST['username']."' and password='".md5($_POST['password'])."'";
	@$result=$conn->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Check Login</title>
</head>
<body>
	<table border="1">
		<?php  
			//Assuming that there's only one match!
			if(isset($result)){
				$row= $result->fetch_assoc();
				echo "<tr><td>username</td><td>".$row['username']."</td>";
				echo "<tr><td>password</td><td>".$row['password']."</td>";
				echo "<tr><td>admin rights</td><td>".$row['admin_rights']."</td>";
			}else{
				echo "<tr><td>Status</td><td>Failed</td>";
			}
		?>
	</table>
	<input type="button" value="Go back home" onclick="location.href='./homepage.html'">
</body>
</html>