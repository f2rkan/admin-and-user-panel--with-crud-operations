<?php
	
	if(!isset($_SESSION["userId"]))
	{
		header("Location:../login.php");
	}
	if(!isset($_SESSION["userType"]) || strtolower($_SESSION["userType"])!="employee")
	{
		header("Location:../login.php");
	}
?>