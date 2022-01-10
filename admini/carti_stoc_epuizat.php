<?php
	session_start();
	include ("../conectare_bd.php");
	include ("autorizare.php");
	include ("admin_top.php");
?>

<div class="col-md-10" class="table-responsive">
<table width = "100%" cellpadding="5">
<tr>
<td colspan="3" align="center">
<h5>Carti stoc epuizat</h5><br>
</td>
</tr>
<?php
$sql = "SELECT carti.id_carte, carti.titlu_carte, autori.nume_autor, carti.pret, carti.promotie
FROM carti, autori, sunt_scrise 
WHERE carti.id_carte = sunt_scrise.id_carte AND autori.id_autor = sunt_scrise.id_autor and carti.nr_buc=0
ORDER BY carti.data_aparitie_lib DESC";


$rows=[];
$result = $db->query($sql);

while($row = $result->fetch_array())
{
$rows[] = $row;
}

for($i=count($rows)-1;$i>0;$i--)
	for($j=0;$j<$i;$j++)
		if(isset($rows[$i]['titlu_carte']) AND isset($rows[$j]['titlu_carte']) AND $rows[$i]['titlu_carte']==$rows[$j]['titlu_carte'])
		{
			$rows[$i]['nume_autor'].=', '.$rows[$j]['nume_autor'];
			array_splice($rows,$j,1);
		}
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
?>
</table>
</div>
</div>