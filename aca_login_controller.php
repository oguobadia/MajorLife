<?php if(!isset($_SESSION)){session_start();}  ?>
<?php
	//Connect to the Database
	include "dbconnect.php";
	//Recieve Login Info
	$username = $_POST['username'];
	$pw = $_POST['password'];	
	//Check login against database
	$query= "SELECT * FROM users WHERE username = '$username' AND password = '$pw'";
	
	$result=mysql_query($query) or die (mysql_error());
	if ($row = mysql_fetch_array($result)){
		$row['username']=$username;	
		$_SESSION['username']=$username;
		include("index.html");
	}else{	
		$errorMessage="Invalid username or password.";
		include("pp_login.php");
	}
?>

