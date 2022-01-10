<?php
session_start();
include ("../conectare_bd.php");
include ("autorizare.php");
include ("admin_top.php");
include ("../functii.php");

if(isset($_POST['adauga_user']))
{
if($_POST['nume']=="" || $_POST['prenume']=="" || $_POST['email']=="" || $_POST['adresa']=="" || $_POST['username']=="" || $_POST['parola']=="")
{
	print 'Trebuie sa completezi toate campurile! <br>
	<a href="adauga.php">Inapoi</a>';
	exit;
}


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
if(mysqli_num_rows($resursa_user) == 1)
{
	print 'Exista deja un cont cu numele '.$_POST['username'];  
	print '<br><a href="adauga.php">Inapoi</a>';
	exit;
}

$sql_user1="select * from useri where email='".$_POST['email']."'";
$resursa_user1=$db->query($sql_user1);
if(mysqli_num_rows($resursa_user1) == 1)
{
	print 'Emailul '.$_POST['username'].' exista deja in baza de date!'; 
	print '<br><a href="adauga.php">Inapoi</a>';
	exit;
}

	$sql = "insert into useri(nume_user, prenume_user, username, password, email, adresa) values 
	('".$nume."','".$prenume."','".$username."','".$parola."','".$email."','".$adresa."')";
	$resursa = $db->query($sql);
	print 'Contul a fost adaugat cu succes!';
	//email catre user cu datele de conectare
}






if(isset($_POST['adauga_domeniu']))
{
	if($_POST['domeniu_nou']=="")
	{
		print 'Trebuie sa completezi numele de domeniu!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	$sql="SELECT * FROM domenii WHERE nume_domeniu='".$_POST['domeniu_nou']."'";
	$resursa=$db->query($sql);
	if($resursa->num_rows != 0)
	{
		print 'Domeniul '.$_POST['domeniu_nou'].' exista deja in baza de date!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	$sql1 = "INSERT INTO domenii(nume_domeniu) VALUES ('".$_POST['domeniu_nou']."')";
	$resursa1=$db->query($sql1);
	print 'Domeniul '.$_POST['domeniu_nou'].' a fost adaugat in baza de date!<br><a href="adauga.php">Inapoi</a>';
	exit;
}


if(isset($_POST['adauga_editura']))
{
	if($_POST['editura_nou']=="" || $_POST['adresa']=="")
	{
		print 'Trebuie sa completezi toate campurile!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	$sql="SELECT * FROM edituri WHERE nume_editura='".$_POST['editura_nou']."'";
	$resursa=$db->query($sql);
	if($resursa->num_rows != 0)
	{
		print 'Editura '.$_POST['editura_nou'].' exista deja in baza de date!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	$sql1 = "INSERT INTO edituri(nume_editura, adresa) VALUES ('".$_POST['editura_nou']."','".$_POST['adresa']."')";
	$resursa1=$db->query($sql1);
	print 'Editura '.$_POST['editura_nou'].' a fost adaugata in baza de date!<br><a href="adauga.php">Inapoi</a>';
	exit;
}


if(isset($_POST['adauga_autor']))
{
	if($_POST['autor_nou']=="")
	{
		print 'Trebuie sa completezi numele autorului!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	$sql="SELECT * FROM autori WHERE nume_autor='".$_POST['autor_nou']."'";
	$resursa=$db->query($sql);
	if($resursa->num_rows != 0)
	{
		print 'Autorul '.$_POST['autor_nou'].' exista deja in baza de date!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	$sql1 = "INSERT INTO autori(nume_autor) VALUES ('".$_POST['autor_nou']."')";
	$resursa1=$db->query($sql1);
	print 'Autorul '.$_POST['autor_nou'].' a fost adaugat in baza de date!<br><a href="adauga.php">Inapoi</a>';
	exit;
}


if(isset($_POST['adauga_carte']))
{
	if($_POST['titlu']=="" || $_POST['descriere']=="" || $_POST['pret']=="" || $_POST['nr_buc']=="" || $_POST['promotie']=="")
	{
		print 'Trebuie sa completezi toate campurile!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	$sql="SELECT *
	FROM carti, autori, sunt_scrise
	WHERE carti.titlu_carte='".$_POST['titlu']."' AND autori.id_autor='".$_POST['id_autor']."' AND carti.id_carte = sunt_scrise.id_carte AND autori.id_autor = sunt_scrise.id_autor";
	$resursa=$db->query($sql);
	if($resursa->num_rows != 0)
	{
		print 'Cartea '.$_POST['titlu'].' exista deja in baza de date!<br><a href="adauga.php">Inapoi</a>';
		exit;
	}
	else
	{
	//inserez in carti
	if($resursa_carte->num_rows == 0)
	{

		$sql1 = "INSERT INTO carti(titlu_carte, descriere, pret, nr_buc, promotie, id_editura, id_domeniu) 
		VALUES ('".$_POST['titlu']."','".$_POST['descriere']."','".$_POST['pret']."','".$_POST['nr_buc']."','".$_POST['promotie']."','".$_POST['id_editura']."','".$_POST['id_domeniu']."')";
		$resursa1=$db->query($sql1);
		print 'Nu uita sa incarci fisierul '.$db->insert_id.'.png cu imaginea cartii, altfel cartea va aparea fara imagine!<br>';
		print 'Cartea '.$_POST['titlu'].' a fost adaugata in baza de date!<br><a href="adauga.php">Inapoi</a>';
		
	}
	//inserez in sunt_scrise
	$sql_carte="SELECT *
	FROM carti
	WHERE carti.titlu_carte = '".$_POST['titlu']."'";
	$resursa_carte=$db->query($sql_carte);
	$row=$resursa_carte->fetch_object();
	$sql_insert="INSERT INTO sunt_scrise(id_autor,id_carte)
	VALUES('".$_POST['id_autor']."','".$row->id_carte."')";
	$resursa_insert=$db->query($sql_insert);
	}
	
		
}
?>
