<?php
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
include ("functii.php");
?>
<div class="col-8">
<?php
if($_POST['username']=="" || $_POST['parola']=="")
{
	print 'Trebuie sa completezi amandoua campurile! <br>
<a href="autentificare.php">Inapoi</a>';
//exit;
}
else
{
include ("conectare_bd.php");
$username=$_POST['username'];
$username=corectez($username);
$parola=$_POST['parola'];
$parola=corectez($parola);

//$parolaEncriptata=md5($_POST['parola']);
$sql_admin="select * from admini where username='".$_POST['username']."' and password='".$_POST['parola']."'";
$sql_user="select * from useri where username='".$_POST['username']."' and password='".$_POST['parola']."'";
$resursa_admin=$db->query($sql_admin);
$resursa_user=$db->query($sql_user);
if(mysqli_num_rows($resursa_admin)!=1 && mysqli_num_rows($resursa_user)!=1)
{
print 'Nume sau parola gresite! <br>
<a href="autentificare.php">Inapoi</a>';
//exit;
}
else 
{

$_SESSION['username']=$username;
$_SESSION['parola']=$parola;
$_SESSION['key']=session_id();
if(mysqli_num_rows($resursa_admin)==1)
	header("location: admini\admin.php");
else
	header("location: useri\user.php");
}
}

?>
</div>
</div>
<?php
include ("page_bottom.php");
?>
