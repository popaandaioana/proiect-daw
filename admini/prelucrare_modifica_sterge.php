<?php
session_start();
include ("../conectare_bd.php");
include ("autorizare.php");
include ("admin_top.php");
include ("../functii.php");

/*modifica sterge domeniu */

if(isset($_POST['modifica_domeniu']))
{
	if($_POST['nume_domeniu']=="")
	{
		print "Nu ati introdus numele de domeniu!<br>";
		print '<a href="modifica_sterge.php">Inapoi</a>';
	}
	else
	{	
		$sql1="SELECT * FROM domenii WHERE nume_domeniu='".$_POST['nume_domeniu']."'";
		$result1 = $db->query($sql1);
		if($result1->num_rows == 0)
		{
		$sql="update domenii set nume_domeniu='".$_POST['nume_domeniu']."'
		where id_domeniu=".$_POST['id_domeniu'];
		$result = $db->query($sql);
		print "Numele domeniului a fost modificat!";
		}
		else
		{
			print "Exista un domeniu cu acest nume!<br>";
			print '<a href="modifica_sterge.php">Inapoi</a>';
		}
	}
}
if(isset($_POST['sterge_domeniu']))
{
		$sql1="delete from domenii 
		where id_domeniu=".$_POST['id_domeniu'];
		$result1 = $db->query($sql1);
		print "Domeniul a fost sters!";
}


/*modifica sterge autor */

if(isset($_POST['modifica_autor']))
{
	if($_POST['nume_autor']=="")
	{
		print "Nu ati introdus numele autorului!<br>";
		print '<a href="modifica_sterge.php">Inapoi</a>';
	}
	else
	{	
		$sql1="SELECT * FROM autori WHERE nume_autor='".$_POST['nume_autor']."'";
		$result1 = $db->query($sql1);
		if($result1->num_rows == 0)
		{
		$sql="update autori set nume_autor='".$_POST['nume_autor']."'
		where id_autor=".$_POST['id_autor'];
		$result = $db->query($sql);
		print "Numele autorului a fost modificat!";
		}
		else
		{
			print "Exista un autor cu acest nume!<br>";
			print '<a href="modifica_sterge.php">Inapoi</a>';
		}
	}
}
if(isset($_POST['sterge_autor']))
{
		$sql1="delete from autori 
		where id_autor=".$_POST['id_autor'];
		$result1 = $db->query($sql1);
		print "Autorul a fost sters!";
}


/*sterge user */

if(isset($_POST['sterge_user']))
{
		$sql1="delete from useri 
		where id_user=".$_POST['id_user'];
		$result1 = $db->query($sql1);
		print "Userul a fost sters!";
}




/*sterge comanda */
if(isset($_POST['sterge_comanda']))
	{
		print 'Comanda a fost stearsa!';
	if($_POST['comanda_onorata']==0)
		{
			$sql = "SELECT carti.id_carte, comenzi_carti.nr_buc as n1, carti.nr_buc as n2
			FROM comenzi,carti,comenzi_carti
			WHERE comenzi.id_comanda=comenzi_carti.id_comanda AND
			comenzi_carti.id_carte=carti.id_carte AND comenzi.id_comanda=".$_POST['id_comanda'];
			$resursa = $db->query($sql);

			while($row = $resursa->fetch_object())
			{
			$row->n1+=$row->n2;
			$sql3 = "update carti set nr_buc='".$row->n1."' where id_carte=".$row->id_carte;
			$resursa3 = $db->query($sql3);
			}
		}
		$sql1="DELETE FROM comenzi_carti WHERE id_comanda=".$_POST['id_comanda'];
		$resursa1=$db->query($sql1);
		$sql2="DELETE FROM comenzi WHERE id_comanda=".$_POST['id_comanda'];
		$resursa2=$db->query($sql2);
	}


/*modifica sterge editura */

if(isset($_POST['modifica_editura']))
{
	if($_POST['nume_editura']=="")
	{
		print "Nu ati introdus numele editurii!<br>";
		print '<a href="modifica_sterge.php">Inapoi</a>';
	}
	else
	{	
		$sql1="SELECT * FROM edituri WHERE nume_editura='".$_POST['nume_editura']."'";
		$result1 = $db->query($sql1);
		if($result1->num_rows == 0)
		{
		$sql="update edituri set nume_editura='".$_POST['nume_editura']."'
		where id_editura=".$_POST['id_editura'];
		$result = $db->query($sql);
		print "Numele editurii a fost modificat!";
		}
		else
		{
			print "Exista o editura cu acest nume!<br>";
			print '<a href="modifica_sterge.php">Inapoi</a>';
		}
	}
}
if(isset($_POST['sterge_editura']))
{
		$sql1="delete from edituri 
		where id_editura=".$_POST['id_editura'];
		$result1 = $db->query($sql1);
		print "Editura a fost stearsa!";
}



/*modifica sterge carte */

if(isset($_POST['modifica_carte']))
{
	if($_POST['titlu_carte']=="")
	{
		print "Nu ati introdus titlul cartii!<br>";
		print '<a href="modifica_sterge.php">Inapoi</a>';
	}
	else
	{	/*adaugare autori?*/
		$sql1="SELECT * FROM carti WHERE id_carte='".$_POST['id_carte']."'";
		$result1 = $db->query($sql1);
		$sql="update carti set titlu_carte='".$_POST['titlu_carte'].
		     "', descriere='".$_POST['descriere']."', pret='".$_POST['pret'].
		     "', promotie='".$_POST['promotie'].
		     "', id_domeniu='".$_POST['id_domeniu'].
		     "', id_editura='".$_POST['id_editura'].
		     "', nr_buc='".$_POST['nr_buc']."'
		where id_carte=".$_POST['id_carte'];
		$result = $db->query($sql);
		print "Datele cartii au fost modificate!";
	}
}
if(isset($_POST['sterge_carte']))
{
/*cartile care apar in comenzi_carti nu pot fi sterse?"*/

		$sql1="delete from carti 
		where id_carte=".$_POST['id_carte'];
		$result1 = $db->query($sql1);
		print "Cartea a fost stearsa!";
}


?>
