<?php
function total()
{
$total=0;
for($i=0; $i<count($_SESSION['id_carte']); $i++)
	$total=$total+$_SESSION['pret'][$i]*$_SESSION['nr_buc'][$i];
return $total;
}

function corectez($sir) {
  $sir = trim($sir); //trim = elimina spatiile de la inceputul si sfarsitul sirului
  $sir = stripslashes($sir); //stripslashes = anuleaza ghilimelele unui sir intre ghilimele ( \'devine ')
  $sir = htmlspecialchars($sir); //htmlspecialchars = converteste caracterele speciale in entitati HTML 
  return $sir;
}
?>



