<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if($_SESSION['key'] != session_id())
{
	print 'Acces neautorizat!';
	exit;
}
include ("../conectare_bd.php");
$sql_admin="select * from admini where username='".$_SESSION['username']."' and password='".$_SESSION['parola']."'";
$resursa_admin=$db->query($sql_admin);
if(mysqli_num_rows($resursa_admin)!=1)
{
	print 'Acces neautorizat!';
	exit;
}
?>