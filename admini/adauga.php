<?php
include ("autorizare.php");
include ("admin_top.php");
?>

<div class="container-fluid">
<h5>Adaugare</h5>

<hr width="25%">

<b>Adauga user</b>
<form action="prelucrare_adaugare.php" method = "POST">
    <div class="col-md-1" class="table-responsive">
	<table width = "100%" cellpadding="5">
		<tr>
		<td>Nume<input type="text" name="nume"></td>
		</tr>
		<tr>
		<td>Prenume<input type="text" name="prenume"></td>
		</tr>
      		<tr>
		<td>Email<input type="text" name="email"></td>
		</tr>
		<tr>
		<td>Adresa<textarea name="adresa" rows="4"></textarea></td>
		</tr>
		<tr>
		<td>Username<input type="text" name="username"></td>
		</tr>
        	<tr>
		<td>Parola<input type="password" name="parola"></td>
		</tr>
        	</table>
        <input type="submit" name="adauga_user" value="Adauga"><br><br>
      </div>

    </div>
  </form>

<hr width="25%">

<b>Adauga domeniu</b>
  <form action="prelucrare_adaugare.php" method = "POST"> 
	<input type="text" name="domeniu_nou">
	<input type="submit" name="adauga_domeniu" value="Adauga"><br><br>
  </form>

<hr width="25%">

<b>Adauga editura</b>
<form action="prelucrare_adaugare.php" method = "POST">
<div class="col-md-1" class="table-responsive">
<table width = "100%" cellpadding="5">
<tr>
<td>Nume editura </td>
<td><input type="text" name="editura_nou"></td>
</tr>
<tr>
<td>Adresa: </td>
<td>
<textarea name="adresa" rows="4"></textarea>
</td>
</tr>
</table>
<input type="submit" name="adauga_editura" value="Adauga"><br><br>
</div>
</form>

<hr width="25%">

<b>Adauga autor</b>
<form action="prelucrare_adaugare.php" method = "POST">
	<input type="text" name="autor_nou">
	<input type="submit" name="adauga_autor" value="Adauga"><br><br>
  </form>

<hr width="25%">

<b>Adauga carte</b>
<form action="prelucrare_adaugare.php" method = "POST">
<div class="col-md-1" class="table-responsive">
<table width = "100%" cellpadding="5">
<tr>
<td>Domeniu</td>
<td>
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
</td>
</tr>


<tr>
<td>Editura</td>
<td>
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
</td>
</tr>

<tr>
<td>Autori</td>
<td>
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
</td>
</tr>
<tr>
<td>Titlu: </td>
<td>
<input type="text" name="titlu">
</td>
</tr>

<tr>
<td>Descriere: </td>
<td>
<textarea name="descriere" rows="4"></textarea>
</td>
</tr>

<tr>
<td>Pret: </td>
<td>
<input type="text" name="pret">
</td>
</tr>

<tr>
<td>Promotie: </td>
<td>
<input type="text" name="promotie">
</td>
</tr>

<tr>
<td>Numar bucati: </td>
<td>
<input type="text" name="nr_buc">
</td>
</tr>

</table>
<input type="submit" name="adauga_carte" value="Adauga"><br><br>
</div>
</form>
</div>
