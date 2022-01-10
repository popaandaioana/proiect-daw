<?php
if(isset($_POST['submit']) )
	{
	session_start();
	session_destroy();
	}
session_start();
include ("autorizare.php");
include ("page_top.php");
include ("meniu.php");
include ("noutati.php");
include ("page_bottom.php");
?>