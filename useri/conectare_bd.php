<?php
@ $db = new mysqli('localhost', 'root', 'mytest', 'librarie');
if(mysqli_connect_errno())
{
	echo 'Eroare: Nu s-a putut face conectarea la baza de date. Te rog, incearca mai tarziu.';
	exit;
}
$db->select_db('librarie');
?>
