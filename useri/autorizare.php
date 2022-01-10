<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if($_SESSION['key'] != session_id())
{
	print 'Acces neautorizat!';
	exit;
}
include ("conectare_bd.php");
$sql_user="select * from useri where username='".$_SESSION['username']."' and password='".$_SESSION['parola']."'";
$resursa_user=$db->query($sql_user);
if(mysqli_num_rows($resursa_user)!=1)
{
	print 'Acces neautorizat!';
	exit;
}
?>