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
if($eroare == '')
{
	print '<h5>Multumim ca ati cumparat de la noi!</h5><br>';
	$sql1 = "insert into comenzi(id_user) values ('".$_SESSION['id_user']."')";
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
	for($i=0;$i<count($_SESSION['id_carte']);$i++)
	{
		if($_SESSION['nr_buc'][$i] > 0)
			$_SESSION['nr_buc'][$i]=0;
	}
	


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
	//$to=$email; //$email;

	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;

	$mail->Username = 'mail2021php@gmail.com';
	$mail->Password = 'and@020202';

	$mail->addReplyTo('mail2021php@gmail.com', 'First Last');//catre cine trimite replay-ul
	$mail->addAddress($_SESSION['email'], $_SESSION['nume_user'].' '.$_SESSION['prenume_user']);//catre cine trimite
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





	/*session_unset();
	session_destroy();*/
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




