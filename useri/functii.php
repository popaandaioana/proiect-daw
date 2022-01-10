<?php
function total()
{
$total=0;
for($i=0; $i<count($_SESSION['id_carte']); $i++)
	$total=$total+$_SESSION['pret'][$i]*$_SESSION['nr_buc'][$i];
return $total;
}

function corectez($sir) {
  $sir = trim($sir);
  $sir = stripslashes($sir);
  $sir = htmlspecialchars($sir);
  return $sir;
}
?>



