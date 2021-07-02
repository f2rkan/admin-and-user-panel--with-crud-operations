<?php
	$mysqli=new MySQLi("localhost","root","","usermaintenance");
	if(mysqli_connect_errno())
	{
		echo "Error".mysqli_connect_errno();
	}
	function baseurl()
	{
		return "http://localhost/AdminPanel/";
	}
	session_start();
?>
