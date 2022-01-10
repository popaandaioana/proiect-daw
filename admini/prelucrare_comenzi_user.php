<?php
	session_start();
	include ("../conectare_bd.php");
	include ("autorizare.php");
	include ("admin_top.php");
	if(isset($_POST['comanda_onorata']))
	{

		$sql="UPDATE comenzi SET comanda_onorata=1 WHERE id_comanda=".$_POST['id_comanda'];
		$resursa=$db->query($sql);
		print 'Comanda a fost onorata!';
	}
	if(isset($_POST['anuleaza_comanda']))
	{
		print 'Comanda a fost anulata!';
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
		$sql1="DELETE FROM comenzi_carti WHERE id_comanda=".$_POST['id_comanda'];
		$resursa1=$db->query($sql1);
		$sql2="DELETE FROM comenzi WHERE id_comanda=".$_POST['id_comanda'];
		$resursa2=$db->query($sql2);
	}
?>
