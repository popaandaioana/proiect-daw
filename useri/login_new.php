<?php
session_start();
include ("conectare_bd.php");
include ("autorizare.php");
include ("page_top.php");
include ("meniu.php");
include ("functii.php");
?>
<div class="col-8">
<?php
if($_POST['nume']=="" || $_POST['prenume']=="" || $_POST['email']=="" || $_POST['adresa']=="" || $_POST['username']=="" || $_POST['parola']=="")
{
	print 'Trebuie sa completezi toate campurile! <br>
<a href="date_cont.php">Inapoi</a>';
//exit;
}
else
{
include ("conectare_bd.php");
$nume=$_POST['nume'];
$nume=corectez($nume);
$prenume=$_POST['prenume'];
$prenume=corectez($prenume);
$email=$_POST['email'];
$email=corectez($email);
$adresa=$_POST['adresa'];
$adresa=corectez($adresa);
$username=$_POST['username'];
$username=corectez($username);
$parola=$_POST['parola'];
$parola=corectez($parola);

$sql_user="select * from useri where username='".$_POST['username']."'";
$resursa_user=$db->query($sql_user);
if($_SESSION['username']!=$_POST['username'])
{
	print 'Exista deja un cont cu numele '.$_POST['username']; 
	print '<br><a href="date_cont.php">Inapoi</a>';
}
else
{
	$sql = "update useri 
		set nume_user='".$nume."',
		    prenume_user='".$prenume."',
		    username='".$username."',
		    password='".$parola."',
		    email='".$email."',
		    adresa='".$adresa."'
		where id_user=".$_SESSION['id_user'];

	$resursa = $db->query($sql);
	print 'Contul a fost modificat cu succes!';
	//email catre user cu datele de conectare

$_SESSION['username']=$_POST['username'];
$_SESSION['parola']=$_POST['parola'];

}

}

?>
</div>
</div>
<?php
include ("page_bottom.php");
?>
