<?php	
	session_start();
	$suid="";
	$susername_mjmaxx="";
	$name="";
	$ma_user_admin="";
	$smodule="";
	$key="";
	$project_path="";
	session_unregister("suid");
	session_unregister("susername_mjmaxx");
	session_unregister("ma_user_admin");
	session_unregister("name");
	session_unregister("key");
	session_unregister("project_path");

	header("Location: login.php");
?>