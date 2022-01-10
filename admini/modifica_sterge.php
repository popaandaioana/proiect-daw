<?php
include ("autorizare.php");
include ("admin_top.php");
?>

<div class="container-fluid">
<h5>Modificare/stergere</h5>
<p>Nota:<br>Nu veti putea sterge domenii care au carti in ele.<br>
Nu veti putea sterge un autor daca exista carti scrise de acel autor.<br>
Nu veti putea sterge o editura daca exista carti publicate la acea editura.<br>
Nu veti putea sterge o carte daca a fost comanda cel putin o data.<br>
Nu veti putea sterge un user daca exista comenzi efectuate de acel user.</p>
<hr width="25%">


<b>Sterge/modifica domeniu</b>
  <form action="formulare_modifica_sterge.php" method = "POST"> 
	<select name ="id_domeniu">
	<?php
	$sql = "SELECT * FROM domenii ORDER BY nume_domeniu ASC";
	$result = $db->query($sql);
	while($row = $result->fetch_object())
	{
		print '<option value="'.$row->id_domeniu.'">'.$row->nume_domeniu.'</option>';
	}
	?>
	</select>
	<input type="submit" name="modifica_domeniu" value="Modifica"><br><br>
	<input type="submit" name="sterge_domeniu" value="Sterge"><br><br>
  </form>

<hr width="25%">

<b>Sterge/modifica autor</b>
<form action="formulare_modifica_sterge.php" method = "POST">
	<select name ="id_autor">
	<?php
	$sql = "SELECT * FROM autori ORDER BY nume_autor ASC";
	$result = $db->query($sql);
	while($row = $result->fetch_object())
	{
		print '<option value="'.$row->id_autor.'">'.$row->nume_autor.'</option>';
	}
	?>
	</select>
	<input type="submit" name="modifica_autor" value="Modifica"><br><br>
	<input type="submit" name="sterge_autor" value="Sterge"><br><br>
  </form>

<hr width="25%">


<b>Sterge user</b>
<form action="formulare_modifica_sterge.php" method = "POST">
    <select name ="id_user">
	<?php
	$sql = "SELECT * FROM useri ORDER BY nume_user ASC";
	$result = $db->query($sql);
	while($row = $result->fetch_object())
	{
		print '<option value="'.$row->id_user.'">'.$row->username.'</option>';
	}
	?>
	</select>
	<input type="submit" name="sterge_user" value="Sterge"><br><br>
  </form>


<hr width="25%">


<b>Sterge comanda</b>
<form action="formulare_modifica_sterge.php" method = "POST">
    <select name ="id_comanda">
	<?php
	$sql = "SELECT * FROM comenzi ORDER BY id_comanda ASC";
	$result = $db->query($sql);
	while($row = $result->fetch_object())
	{
		print '<option value="'.$row->id_comanda.'">'.$row->id_comanda.'</option>';
	}
	?>
	</select>
	<input type="submit" name="sterge_comanda" value="Sterge"><br><br>
</form>

<hr width="25%">

<b>Sterge/modifica editura</b>
<form action="formulare_modifica_sterge.php" method = "POST">
<select name ="id_editura">
	<?php
	$sql = "SELECT * FROM edituri ORDER BY nume_editura ASC";
	$result = $db->query($sql);
	while($row = $result->fetch_object())
	{
		print '<option value="'.$row->id_editura.'">'.$row->nume_editura.'</option>';
	}
	?>
	</select>
	<input type="submit" name="modifica_editura" value="Modifica"><br><br>
	<input type="submit" name="sterge_editura" value="Sterge"><br><br>
</form>

<hr width="25%">

<b>Modifica/sterge carte</b>
<form action="formulare_modifica_sterge.php" method = "POST">
<div class="col-md-1" class="table-responsive">
<table width = "100%" cellpadding="5">


<tr>
<td>Titlu: </td>
<td>
<select name ="id_carte">
<?php
$sql = "SELECT * FROM carti ORDER BY titlu_carte ASC";
$result = $db->query($sql);
while($row = $result->fetch_object())
{
	print '<option value="'.$row->id_carte.'">'.$row->titlu_carte.'</option>';
}
?>
</select>
</td>
</tr>

</table>
<input type="submit" name="modifica_carte" value="Modifica"><br><br>
<input type="submit" name="sterge_carte" value="Sterge"><br><br>
</div>
</form>
</div>
