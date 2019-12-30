<?php
	
	// Get the values from the from 
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	// In order to prevent mysql injection
	//$username = stripcslashes($username);
	//$password = stripcslashes($password);
	//$username = mysql_real_escape_string($username);
	//$password = mysql_real_escape_string($password);
	
	// Now connect to the server and select a database.
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "login");
	
	$results = mysqli_query($link, "select * from users where username = '$username' and password = '$password'")
				or die("Failed to query database ");
	$row = mysqli_fetch_array($results);
	if($row['username'] == $username && $row['password'] == $password)
	{
		echo "Login successful! Welcome ";
	}
	else
	{
		echo "Login Failed!!!";
	}

?>