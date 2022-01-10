<?php
@ $db = new mysqli('sql310.epizy.com', 'epiz_30308701', 'uNSuVH5oHP2cVtj', 'epiz_30308701_librarie');
if(mysqli_connect_errno())
{
	echo 'Eroare: Nu s-a putut face conectarea la baza de date. Te rog, incearca mai tarziu.';
	exit;
}
$db->select_db('epiz_30308701_librarie');
?>
