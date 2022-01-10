<?php
if(isset($_POST['submit']) )
	{
	session_start();
	session_destroy();
	}
session_start();
include ("autorizare.php");
include ("admin_top.php");
?>
