<?php
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
include ("functii.php");
?>
<div class="col-md-10" class="table-responsive">
<?php

if(empty($_SESSION['id_carte']))
	$_SESSION['id_carte']=[];

//adauga
if(isset($_GET['actiune']) && $_GET['actiune'] == "adauga")
{
	if(!in_array($_POST['id_carte'],$_SESSION['id_carte']))
	{
	$_SESSION['id_carte'][]=$_POST['id_carte'];
	$_SESSION['nr_buc'][]=1;
	$_SESSION['pret'][]=$_POST['pret'];
	$_SESSION['titlu_carte'][]=$_POST['titlu_carte'];
	$_SESSION['nume_autor'][]=$_POST['nume_autor'];
	}
	else
	{
	for($i=0;$i<count($_SESSION['id_carte']) && $_SESSION['id_carte'][$i]!=$_POST['id_carte'];$i++);
	$_SESSION['nr_buc'][$i]++;
	$_SESSION['nume_autor'][$i]=$_POST['nume_autor'];
	}
}

//modifica
if(isset($_GET['actiune']) && $_GET['actiune'] == "modifica")
{
	for($i=0; $i<count($_SESSION['id_carte']); $i++)
	{
	if(isset($_SESSION['nr_buc'][$i]) && isset($_POST['noulNrBuc'][$i]))
		$_SESSION['nr_buc'][$i] = $_POST['noulNrBuc'][$i];

	}

}

?>


<div class="container">
<form action="cos.php?actiune=modifica" method = "POST">

<?php
$total=total();
if(count($_SESSION['id_carte'])>0 && $total>0)
{
print '<table width = "100%" cellpadding="5">';
print '<tr>';
print '<td colspan="3" align = "center">'.'<h3>Cosul de cumparaturi</h3>'.'</td>';
print '</tr>';

print '<tr>';
	print '<td>'.'<u>Titlu</u>'.'</td>';
	print '<td>'.'<u>Autor</u>'.'</td>';
	print '<td>'.'<u>Pret</u>'.'</td>';
	print '<td>'.'<u>Nr buc</u>'.'</td>';
	print '</tr>';


$ok=1;
for($i=0; $i<count($_SESSION['id_carte']); $i++)
	{
	if($_SESSION['nr_buc'][$i]>0)
	{
	$id=$_SESSION['id_carte'][$i];
	$sql = "SELECT carti.id_carte, carti.nr_buc
	FROM carti
	WHERE carti.id_carte = $id";
	$resursa = $db->query($sql);
	$row = $resursa->fetch_object();
	print '<tr>';
	print '<td>'.$_SESSION['titlu_carte'][$i].'</td>';
	print '<td>'.$_SESSION['nume_autor'][$i].'</td>';
	print '<td>'.$_SESSION['pret'][$i].'</td>';
	print '<td>'.'<input type="text" size="1" name="noulNrBuc['.$i.']" value="'.$_SESSION['nr_buc'][$i].'"></td>';
	print '<td>'.'Stoc '.$row->nr_buc.' buc</td>';
	print '</tr>';
	if($_SESSION['nr_buc'][$i]>$row->nr_buc)
		$ok=0;
	}
	}




print '<tr>';
	print '<td></td>';
	print '<td></td>';
	print '<td>'.'<u>Pret total: </u>'.$total.' lei</td>';
	print '</tr>';
print '</table>';
}
else if($total==0)
	{
	echo 'Cosul este gol!';
	}
?>
   <div class="row">
	<div class="col">
<?php
if(count($_SESSION['id_carte'])>0 && $total>0)
        	print '<input type='.'"submit" value="Actualizeaza cos">';
?>
      	</div>
   </div>
 </form>




  
  <form action="casa.php" method = "POST">
  <INPUT type = "hidden" name = "total" value = "<?=$total?>">	
   <div class="row" align = "right">
	<div class="col">
<?php if(count($_SESSION['id_carte'])>0 && $total>0 && $ok==1)
        	print '<input type='.'"submit" value="Mergi la casa">';
?>
      	</div>
   </div>
 </form>

</div>


</div>
<?php
include ("page_bottom.php");
?>