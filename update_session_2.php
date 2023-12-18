<?php
	//Another File
	session_start();
	if (isset($_POST["areaIdVar"]))
	{
		$_SESSION["areaIdVar"] = $_POST["areaIdVar"];
	}
?>