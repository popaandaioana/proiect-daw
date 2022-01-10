<?php
	session_start();
	include ("../conectare_bd.php");
	include ("autorizare.php");
	include ("admin_top.php");
?>

<h5>Comenzi</h5>
<b>Comenzi guest inca neonorate: </b>

<?php
	$sqlComenziGuest="SELECT comenzi.id_comanda, DATE_FORMAT(comenzi.data_comanda,'%d-%m-%y') as data_comanda,
	     			 guest.nume_guest, guest.prenume_guest, guest.adresa_guest
	     		  FROM comenzi,guest
	     		  WHERE comenzi.id_guest=guest.id_guest AND comenzi.comanda_onorata=0";
	$resursaComenziGuest=$db->query($sqlComenziGuest);
	print $resursaComenziGuest->num_rows.'<br><br>';
	while($rowComanda = $resursaComenziGuest->fetch_object())
	{
?>
			<form action="prelucrare_comenzi_guest.php" method="POST">
			Data comenzii:
			<b><?php $totalGeneral=0; print $rowComanda->data_comanda ?></b>
			<div>
				<b><?php print $rowComanda->nume_guest.' '.$rowComanda->prenume_guest?></b><br>
				<?php print $rowComanda->adresa_guest?>
				<table border="1" cellpadding="4" cellspacing="0">
					<tr>
						<td align="center"><b>Carte</b></td>
						<td align="center"><b>Nr buc</b></td>
						<td align="center"><b>Pret</b></td>
						<td align="center"><b>Total</b></td>
					</tr>

			<?php
				$sqlCarti="SELECT carti.titlu_carte, carti.pret, comenzi_carti.nr_buc
	   				   FROM carti, comenzi, comenzi_carti
	   				   WHERE carti.id_carte=comenzi_carti.id_carte AND comenzi.id_comanda=".$rowComanda->id_comanda."
	   				   AND comenzi_carti.id_comanda=".$rowComanda->id_comanda;
					   $resursaCarti=$db->query($sqlCarti);
				while($rowCarte = $resursaCarti->fetch_object())
				{
					print '<tr><td>'.$rowCarte->titlu_carte.'</td>
					<td align="right">'.$rowCarte->nr_buc.'</td><td align="right">'.$rowCarte->pret.'</td>';
					$total=$rowCarte->pret*$rowCarte->nr_buc;
					print '<td align="right">'.$total.'</td></tr>';
					$totalGeneral=$totalGeneral+$total;
				}
			?>
				<tr>
					<td colspan="3" align="right"> Total comanda:</td>
					<td><?php print $totalGeneral?></td>
				</tr>
				</table>
				<input type="hidden" name="id_comanda" value="<?php print $rowComanda->id_comanda?>">
				<input type="submit" name="comanda_onorata" value="Comanda onorata">
				<input type="submit" name="anuleaza_comanda" value="Anuleaza comanda"> 
			</div><br>
		</form>

<?php
	}
?>


<b>Comenzi user inca neonorate: </b>

<?php
	$sqlComenziUser="SELECT comenzi.id_comanda, DATE_FORMAT(comenzi.data_comanda,'%d-%m-%y') as data_comanda,
	     useri.nume_user, useri.prenume_user, useri.adresa
	     FROM comenzi,useri
	     WHERE comenzi.id_user=useri.id_user AND comenzi.comanda_onorata=0";
	$resursaComenziUser=$db->query($sqlComenziUser);
	print $resursaComenziUser->num_rows.'<br><br>';
	while($rowComanda = $resursaComenziUser->fetch_object())
	{
?>

<form action="prelucrare_comenzi_user.php" method="POST">
	Data comenzii:
	<b><?php $totalGeneral=0; print $rowComanda->data_comanda ?></b>
	<div>
		<b><?php print $rowComanda->nume_user.' '.$rowComanda->prenume_user?></b><br>
		<?php print $rowComanda->adresa?>
		<table border="1" cellpadding="4" cellspacing="0">
			<tr>
				<td align="center"><b>Carte</b></td>
				<td align="center"><b>Nr buc</b></td>
				<td align="center"><b>Pret</b></td>
				<td align="center"><b>Total</b></td>
			</tr>

<?php
	$sqlCarti="SELECT carti.titlu_carte, carti.pret, comenzi_carti.nr_buc
	   FROM carti, comenzi, comenzi_carti
	   WHERE carti.id_carte=comenzi_carti.id_carte AND comenzi.id_comanda=".$rowComanda->id_comanda."
	   AND comenzi_carti.id_comanda=".$rowComanda->id_comanda;
	$resursaCarti=$db->query($sqlCarti);
	while($rowCarte = $resursaCarti->fetch_object())
	{
		print '<tr><td>'.$rowCarte->titlu_carte.'</td>
			<td align="right">'.$rowCarte->nr_buc.'</td><td align="right">'.$rowCarte->pret.'</td>';
		$total=$rowCarte->pret*$rowCarte->nr_buc;
		print '<td align="right">'.$total.'</td></tr>';
		$totalGeneral=$totalGeneral+$total;
	}
?>
		<tr>
			<td colspan="3" align="right"> Total comanda:</td>
			<td><?php print $totalGeneral?></td>
		</tr>
		</table>
		<input type="hidden" name="id_comanda" value="<?php print $rowComanda->id_comanda?>">
		<input type="submit" name="comanda_onorata" value="Comanda onorata">
		<input type="submit" name="anuleaza_comanda" value="Anuleaza comanda"> 
	</div><br>
</form>

<?php
	}
?>
