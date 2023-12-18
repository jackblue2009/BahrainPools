<?php
	//Another File
	session_start();
	if (isset($_POST["val"]))
	{
		$_SESSION["val"] = $_POST["val"];
	}
?>