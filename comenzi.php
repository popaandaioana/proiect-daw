<?php
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
include ("functii.php");
$eroare = '';

?>
<div class="col-md-9" class="table-responsive">
<table width = "100%" cellpadding="5">
<tr>
<td>
<?php
if(empty($_POST['nume'])) {
  $eroare = '<p>Nu ați introdus numele!</p>';
  print $eroare;
} else {
  $nume = corectez($_POST['nume']);
}
?>
</td>
</tr>
<tr>
<td>
<?php
if(empty($_POST['prenume'])) {
  $eroare = '<p>Nu ați introdus prenumele!</p>';
  print $eroare;
} else {
  $prenume = corectez($_POST['prenume']);
}
?>
</td>
</tr>
<tr>
<td>
<?php
if(empty($_POST['email'])) {
  $eroare = '<p>Nu ați introdus email-ul!</p>';
  print $eroare;
} else {
  $email = corectez($_POST['email']);
}
?>
</td>
</tr>
<tr>
<td>
<?php
if(empty($_POST['adresa'])) {
  $eroare = '<p>Nu ați introdus adresa!</p>';
  print $eroare;
} else {
  $adresa = corectez($_POST['adresa']);
}
?>
</td>
</tr>
<tr>
<td>
<?php
if($eroare == '')
{
	print '<h5>Multumim ca ati cumparat de la noi!</h5><br>';
	$sql = "insert into guest(nume_guest, prenume_guest, email_guest, adresa_guest) values 
	('".$_POST['nume']."','".$_POST['prenume']."','".$_POST['email']."','".$_POST['adresa']."')";
	$resursa = $db->query($sql);
	$id_guest = $db->insert_id;
	$sql1 = "insert into comenzi(id_guest) values ('".$id_guest."')";
	$resursa1 = $db->query($sql1);
	$id_comanda = $db->insert_id;
	for($i=0;$i<count($_SESSION['id_carte']);$i++)
	{
		if($_SESSION['nr_buc'][$i] > 0)
		{
		$id=$_SESSION['id_carte'][$i];
		$sql = "SELECT carti.id_carte, carti.nr_buc
		FROM carti
		WHERE carti.id_carte = $id";
		$resursa = $db->query($sql);
		$row = $resursa->fetch_object();
		$row->nr_buc-=$_SESSION['nr_buc'][$i];
		$sql4 = "update carti set nr_buc='".$row->nr_buc."' where id_carte=".$id;
		$resursa4 = $db->query($sql4);
		$sql3 = "insert into comenzi_carti(id_comanda, id_carte, nr_buc) values 
		('".$id_comanda."','".$_SESSION['id_carte'][$i]."','".$_SESSION['nr_buc'][$i]."')"; 
		$resursa3 = $db->query($sql3);
		}
	}
	//trimite mail catre client



require_once('class.phpmailer.php');
//require_once('class.pop3.php');
//require_once('class.smtp.php');

$message="Comanda dvs. nr. ".$id_comanda." a fost preluata si va fi livrata in cel mai scurt timp!";

$mail = new PHPMailer(true);

$mail->isSMTP();

try
{
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$to=$email; //$email;

	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;

	$mail->Username = 'mail2021php@gmail.com';
	$mail->Password = 'and@020202';

	$mail->addReplyTo('mail2021php@gmail.com', 'First Last');//catre cine trimite replay-ul
	$mail->addAddress($to, $nume.' '.$prenume);//catre cine trimite
	$mail->msgHTML($message);
	$mail->setFrom('mail2021php@gmail.com', 'Librarie Anda');//cine trimite
	$mail->Subject = "Comanda preluata";
	$mail->AltBody = "Comanda preluata!";
	$mail->send();

}catch(phpmailerException $e){
echo $e->errorMessage();
}catch(Exception $e){
echo $e->getMessage();
}







	session_unset();
	session_destroy();
}
else
	  print '<a href = "casa.php">Inapoi</a>';
?>
</td>
</tr>



</table>
</div>
</div>
<?php

include ("page_bottom.php");
?>




