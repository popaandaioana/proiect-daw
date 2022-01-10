<?php
include ("autorizare.php");
include ("admin_top.php");

/*modifica sterge domeniu*/

if(isset($_POST['modifica_domeniu']))
{
	$sql="SELECT nume_domeniu FROM domenii
	WHERE id_domeniu='".$_POST['id_domeniu']."'";
	$result = $db->query($sql);
	$row = $result->fetch_object();
?>
<h5>Modifica nume domeniu</h5>
<form action="prelucrare_modifica_sterge.php" method="POST">
<input type="text" name="nume_domeniu" value="<?=$row->nume_domeniu?>">
<input type="hidden" name="id_domeniu" value="<?=$_POST['id_domeniu']?>">
<input type="submit" name="modifica_domeniu" value="Modifica">
</form>	
<?php
}

if(isset($_POST['sterge_domeniu']))
{
	$sql="SELECT carti.titlu_carte
	FROM carti, domenii
	WHERE carti.id_domeniu=domenii.id_domeniu AND domenii.id_domeniu=".$_POST['id_domeniu'];
	$result = $db->query($sql);
	$nr_carti = $result->num_rows;
	if($nr_carti>0)
	{
		print "<p>Sunt $nr_carti carti care apartin acestui domeniu.</p>";
		while($row = $result->fetch_object())
		{
			print $row->titlu_carte."<br>";
		}
		print "<p>Nu puteti sterge acest domeniu.</p>";
	}
	else
	{
	?>
	<h5>Sterge nume domeniu</h5>
	Esti sigur ca vrei sa stergi acest domeniu?
	<form action="prelucrare_modifica_sterge.php" method="POST">
	<input type="hidden" name="id_domeniu" value="<?=$_POST['id_domeniu']?>">
	<input type="submit" name="sterge_domeniu" value="Sterge">
	</form>
	<?php
	}
}

/*modifica sterge autor*/

if(isset($_POST['modifica_autor']))
{
	$sql="SELECT nume_autor FROM autori
	WHERE id_autor='".$_POST['id_autor']."'";
	$result = $db->query($sql);
	$row = $result->fetch_object();
?>
<h5>Modifica nume autor</h5>
<form action="prelucrare_modifica_sterge.php" method="POST">
<input type="text" name="nume_autor" value="<?=$row->nume_autor?>">
<input type="hidden" name="id_autor" value="<?=$_POST['id_autor']?>">
<input type="submit" name="modifica_autor" value="Modifica">
</form>	
<?php
}

if(isset($_POST['sterge_autor']))
{
	$sql="SELECT carti.titlu_carte
	FROM carti, autori, sunt_scrise
	WHERE carti.id_carte=sunt_scrise.id_carte AND sunt_scrise.id_autor=autori.id_autor 
	      AND autori.id_autor=".$_POST['id_autor'];
	$result = $db->query($sql);
	$nr_carti = $result->num_rows;
	if($nr_carti>0)
	{
		print "<p>Sunt $nr_carti carti care sunt scrise de acest autor.</p>";
		while($row = $result->fetch_object())
		{
			print $row->titlu_carte."<br>";
		}
		print "<p>Nu puteti sterge acest autor.</p>";
	}
	else
	{
	?>
	<h5>Sterge nume autor</h5>
	Esti sigur ca vrei sa stergi acest autor?
	<form action="prelucrare_modifica_sterge.php" method="POST">
	<input type="hidden" name="id_autor" value="<?=$_POST['id_autor']?>">
	<input type="submit" name="sterge_autor" value="Sterge">
	</form>
	<?php
	}
}


/*sterge user*/

if(isset($_POST['sterge_user']))
{
	$sql="SELECT comenzi.id_comanda, useri.id_user
	FROM useri, comenzi
	WHERE useri.id_user=comenzi.id_user AND useri.id_user=".$_POST['id_user'];
	$result = $db->query($sql);
	$nr_comenzi = $result->num_rows;
	if($nr_comenzi>0)
	{
		print "<p>Sunt $nr_comenzi comenzi efectuate de acest user.</p>";
		while($row = $result->fetch_object())
		{
			print "id_comanda: ".$row->id_comanda."<br>";
		}
		print "<p>Nu puteti sterge acest user.</p>";
	}
	else
	{
	?>
	<h5>Sterge nume user</h5>
	Esti sigur ca vrei sa stergi acest user?
	<form action="prelucrare_modifica_sterge.php" method="POST">
	<input type="hidden" name="id_user" value="<?=$_POST['id_user']?>">
	<input type="submit" name="sterge_user" value="Sterge">
	</form>
	<?php
	}
}


/*sterge comanda*/
if(isset($_POST['sterge_comanda']))
{
	?>
	<h5>Sterge comanda</h5>
	Esti sigur ca vrei sa stergi aceasta comanda?
	<?php 
	$sql = "SELECT * FROM comenzi WHERE id_comanda=".$_POST['id_comanda'];
	$result = $db->query($sql);
	$row = $result->fetch_object();
	if($row->comanda_onorata==0)
		print 'Ea nu a fost onorata!';
	else
		print 'Ea a fost onorata!'; ?>
	<form action="prelucrare_modifica_sterge.php" method="POST">
	<input type="hidden" name="id_comanda" value="<?=$_POST['id_comanda']?>">
	<input type="hidden" name="comanda_onorata" value="<?=$row->comanda_onorata?>">
	<input type="submit" name="sterge_comanda" value="Sterge">
	</form>
	<?php
}


/*modifica sterge editura*/

if(isset($_POST['modifica_editura']))
{
	$sql="SELECT nume_editura FROM edituri
	WHERE id_editura='".$_POST['id_editura']."'";
	$result = $db->query($sql);
	$row = $result->fetch_object();
?>
<h5>Modifica nume editura</h5>
<form action="prelucrare_modifica_sterge.php" method="POST">
<input type="text" name="nume_editura" value="<?=$row->nume_editura?>">
<input type="hidden" name="id_editura" value="<?=$_POST['id_editura']?>">
<input type="submit" name="modifica_editura" value="Modifica">
</form>	
<?php
}

if(isset($_POST['sterge_editura']))
{
	$sql="SELECT carti.titlu_carte
	FROM carti, edituri
	WHERE carti.id_editura=edituri.id_editura AND edituri.id_editura=".$_POST['id_editura'];
	$result = $db->query($sql);
	$nr_carti = $result->num_rows;
	if($nr_carti>0)
	{
		print "<p>Sunt $nr_carti carti care sunt publicate la aceasta editura.</p>";
		while($row = $result->fetch_object())
		{
			print $row->titlu_carte."<br>";
		}
		print "<p>Nu puteti sterge aceasta editura.</p>";
	}
	else
	{
	?>
	<h5>Sterge nume editura</h5>
	Esti sigur ca vrei sa stergi aceasta editura?
	<form action="prelucrare_modifica_sterge.php" method="POST">
	<input type="hidden" name="id_editura" value="<?=$_POST['id_editura']?>">
	<input type="submit" name="sterge_editura" value="Sterge">
	</form>
	<?php
	}
}


/*modifica sterge carte*/
if(isset($_POST['modifica_carte']))
{
	$sql="SELECT * FROM carti, edituri, domenii
	WHERE carti.id_editura=edituri.id_editura AND carti.id_domeniu=domenii.id_domeniu 
	AND carti.id_carte='".$_POST['id_carte']."'";
	$result = $db->query($sql);
	$row = $result->fetch_object();

?>
<h5>Modifica date carte</h5>
<form action="prelucrare_modifica_sterge.php" method="POST">
<input type="hidden" name="id_carte" value="<?=$_POST['id_carte']?>">
<label>Titlu</label><br><input type="text" name="titlu_carte" size="50" value="<?php print $row->titlu_carte?>"><br>
<label>Descriere</label><br><textarea name="descriere" rows="4" cols="50"><?php print $row->descriere?></textarea><br>

<label>Domeniu</label><br>
<select name ="id_domeniu">

	<?php
	$sql1 = "SELECT * FROM domenii ORDER BY nume_domeniu ASC";
	$result1 = $db->query($sql1);
	while($row1 = $result1->fetch_object())
	{
	if($row->id_domeniu==$row1->id_domeniu)
		print '<option selected="selected" value="'.$row->id_domeniu.'">'.$row->nume_domeniu.'</option>';
	else
		print '<option value="'.$row1->id_domeniu.'">'.$row1->nume_domeniu.'</option>';
	}
	?>
	
</select>
<br>


<label>Editura</label><br>
<select name ="id_editura">
	<?php
	$sql2 = "SELECT * FROM edituri ORDER BY nume_editura ASC";
	$result2 = $db->query($sql2);
	while($row2 = $result2->fetch_object())
	{
		if($row->id_editura==$row2->id_editura)
			print '<option selected="selected" value="'.$row->id_editura.'">'.$row->nume_editura.'</option>';
		else
			print '<option value="'.$row2->id_editura.'">'.$row2->nume_editura.'</option>';
	}
	?>
</select>
<br>

<label>Pret</label><br><input type="text" name="pret" value="<?php print $row->pret?>"><br>
<label>Promotie</label><br><input type="text" name="promotie" value="<?php print $row->promotie?>"><br>
<label>Nr_buc</label><br><input type="text" name="nr_buc" value="<?php print $row->nr_buc?>"><br>
<input type="submit" name="modifica_carte" value="Modifica"><br>
</form>	
<?php
}

if(isset($_POST['sterge_carte']))
{
	?>
	<h5>Sterge carte</h5>
	Esti sigur ca vrei sa stergi aceasta carte?
	<form action="prelucrare_modifica_sterge.php" method="POST">
	<input type="hidden" name="id_carte" value="<?=$_POST['id_carte']?>">
	<input type="submit" name="sterge_carte" value="Sterge">
	</form>
	<?php
}

?>