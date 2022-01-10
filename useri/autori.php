<?php
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
$id_autor=$_GET['id_autor'];

//interogare tabel carti
$sql = "SELECT carti.id_carte, carti.titlu_carte, autori.nume_autor, carti.pret, carti.promotie
FROM carti, autori, sunt_scrise 
WHERE autori.id_autor = $id_autor AND carti.id_carte = sunt_scrise.id_carte AND autori.id_autor = sunt_scrise.id_autor";
$result=$db->query($sql);
$num_results=$result->num_rows;
?>

<div class="col-md-9" class="table-responsive">
<table width = "100%" cellpadding="5">
<tr>
<td colspan="3" align="center">
</td>
</tr>

<?php
if($num_results==0)
	print "<tr><td><i>Niciun rezultat</i></td></tr>";

//carti gasite

$rows=[];
$result = $db->query($sql);
while($row = $result->fetch_array())
{
$rows[] = $row;
}



/*for($i=0;$i<count($rows)-1;$i++)
{
//$rows[$i]['titlu_carte']

	$sql1 = "SELECT autori.nume_autor
	FROM carti, autori, sunt_scrise 
	WHERE carti.titlu_carte=$rows[$i]['titlu_carte'] AND carti.id_carte = sunt_scrise.id_carte AND autori.id_autor = sunt_scrise.id_autor";
	$rows1=[];
	$result1 = $db->query($sql1);
	while($row1 = $result1->fetch_array())
	{
	$rows1[] = $row1;
	}

	$autor=[];
	for($j=0;$j<count($rows1)-1;$j++)
		if(isset($rows1[$j]['nume_autor']))
		{
			$autor[$i].=$rows1[$j]['nume_autor'].', ';
		}
}*/




if(count($rows))
	$i=1;
for($k=0;$k<count($rows);$k++)
{
	if($i%3==1)
		print '<tr>';
	$adresaImagine = "img/mici/" .$rows[$k]['id_carte'].".jpg";
	$pretNou=$rows[$k]['pret']-($rows[$k]['promotie']/100)*$rows[$k]['pret'];
	print '<td align = "center" valign="top">';
	if(file_exists($adresaImagine))
		print '<img src = "'.$adresaImagine.'"><br>';
	else
		print '<img src = "img/mici/0.jpg"><br>';
	if($rows[$k]['promotie']>0)
		print '<a href = "carte.php? id_carte=' .$rows[$k]['id_carte'].'">'.$rows[$k]['titlu_carte'].'</a><br> de ' .$rows[$k]['nume_autor'].'<br> Pret: <del>'. $rows[$k]['pret'].'lei </del><br>Pret nou: '.$pretNou.' lei<br> Discount: '.$rows[$k]['promotie'].'%</td>';
	else
		print '<a href = "carte.php? id_carte=' .$rows[$k]['id_carte'].'">'.$rows[$k]['titlu_carte'].'</a><br> de ' .$rows[$k]['nume_autor'].'<br> Pret: '. $rows[$k]['pret'].'lei</td>';	
	$i++;
	if($i%3==1)
		print '</tr>';
}



/*if($result->num_rows)
	$i=1;
while($row=$result->fetch_object())
{
	if($i%3==1)
		print '<tr>';
	$adresaImagine = "img/mici/" .$row->id_carte.".jpg";
	$pretNou=$row->pret-($row->promotie/100)*$row->pret;
	print '<td align = "center">';
	print '<img src = "'.$adresaImagine.'"><br>';
	if($row->promotie>0)
		print '<a href = "carte.php?id_carte=' .$row->id_carte.'">'.$row->titlu_carte.'</a><br> de ' .$row->nume_autor.'<br> Pret: <del>'. $row->pret.'lei </del><br>Pret nou: '.$pretNou.' lei<br> Discount: '.$row->promotie.'%</td>';
	else
		print '<a href = "carte.php?id_carte=' .$row->id_carte.'">'.$row->titlu_carte.'</a><br> de ' .$row->nume_autor.'<br> Pret: '. $row->pret.'lei</td>';
	$i++;
	if($i%3==1)
		print '</tr>';
}*/


?>
</table>
</div>
</div>
<?php
include ("page_bottom.php");
?>




