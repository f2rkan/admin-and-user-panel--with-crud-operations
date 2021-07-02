<?php
	
	if(!isset($_SESSION["userId"]))
	{
		header("Location:../login.php");
	}
	if(!isset($_SESSION["userType"]) || strtolower($_SESSION["userType"])!="admin")
	{
		header("Location:../login.php");
	}
?>