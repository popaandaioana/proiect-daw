<?php
if(isset($_POST['deconectare']) )
	{
	session_start();
	session_destroy();
	}
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
include ("noutati.php");
include ("page_bottom.php");
?>
