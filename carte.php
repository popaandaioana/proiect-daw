<?php
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
?>
<div class="col-md-10" class="table-responsive">
<table width = "100%" cellpadding="5">
<?php
$id_carte=$_GET['id_carte'];
$sql = "SELECT carti.id_carte, carti.titlu_carte, carti.nr_buc, autori.nume_autor, carti.descriere, carti.pret, carti.promotie
FROM carti, autori, sunt_scrise 
WHERE carti.id_carte =  ".$id_carte." AND carti.id_carte = sunt_scrise.id_carte AND autori.id_autor = sunt_scrise.id_autor";
$resursa = $db->query($sql);
$row = $resursa->fetch_object();
print '<tr>';
$adresaImagine = "img/mari/" .$row->id_carte.".jpg";
$pretNou=$row->pret-($row->promotie/100)*$row->pret;
print '<td align = "center" valign="top">';

if(file_exists($adresaImagine))
		print '<img src = "'.$adresaImagine.'"><br>';
	else
		print '<img src = "img/mari/0.jpg"><br>';


$rows=[];
$result = $db->query($sql);
while($row1 = $result->fetch_array())
{
$rows[] = $row1;
}
for($i=count($rows)-1;$i>0;$i--)
	for($j=0;$j<$i;$j++)
		if(isset($rows[$i]['titlu_carte']) AND isset($rows[$j]['titlu_carte']) AND $rows[$i]['titlu_carte']==$rows[$j]['titlu_carte'])
		{
			$rows[$i]['nume_autor'].=', '.$rows[$j]['nume_autor'];
			array_splice($rows,$j,1);
		}




if($row->promotie>0)
	print $row->titlu_carte.'<br> de ' .$rows[0]['nume_autor'].'<br> Descriere: '.$row->descriere.'<br> Pret: <del>'. $row->pret.'lei </del><br>Pret nou: '.$pretNou.' lei<br> Discount: '.$row->promotie.'%</td>';
else
	print $row->titlu_carte.'</a><br> de ' .$rows[0]['nume_autor'].'<br> Descriere: '.$row->descriere.'<br> Pret: '. $row->pret.'lei</td>';	
print '</tr>';
?>
<tr>
<td align = "center">

<?php 
if($row->nr_buc==0) 
{
	print 'Cartea nu este in stoc!'; }
else {?>
<div class="container">
  <form action="cos.php?actiune=adauga" method = "POST">
  <INPUT type = "hidden" name = "id_carte" value = "<?=$row->id_carte?>">
  <INPUT type = "hidden" name = "titlu_carte" value = "<?=$row->titlu_carte?>">
  <INPUT type = "hidden" name = "nume_autor" value = "<?php print $rows[0]['nume_autor']?>">
  <INPUT type = "hidden" name = "pret" value = "<?=$pretNou?>">	
    <div class="row">
	<div class="col">
        	<input type="submit" value="Adauga in cos">
      	</div>
   </div>
 </form>
</div>
<?php }?>



</td>
</tr>
</table>
</div>
</div>
<?php
include ("page_bottom.php");
?>