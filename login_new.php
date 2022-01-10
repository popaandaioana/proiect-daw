<?php
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
include ("functii.php");
?>
<div class="col-8">
<?php
if($_POST['nume']=="" || $_POST['prenume']=="" || $_POST['email']=="" || $_POST['adresa']=="" || $_POST['username']=="" || $_POST['parola']=="")
{
	print 'Trebuie sa completezi toate campurile! <br>
<a href="cont_nou.php">Inapoi</a>';
//exit;
}
else
{
include ("conectare_bd.php");
$nume=$_POST['nume'];
$nume=corectez($nume);
$prenume=$_POST['prenume'];
$prenume=corectez($prenume);
$email=$_POST['email'];
$email=corectez($email);
$adresa=$_POST['adresa'];
$adresa=corectez($adresa);
$username=$_POST['username'];
$username=corectez($username);
$parola=$_POST['parola'];
$parola=corectez($parola);

//$parolaEncriptata=md5($_POST['parola']);
$sql_user="select * from useri where email='".$_POST['email']."'";
$resursa_user=$db->query($sql_user);
if(mysqli_num_rows($resursa_user) == 1)
{
	print 'Exista deja un cont cu email-ul '.$_POST['email']; 
	print '<br><a href="cont_nou.php">Inapoi</a>';
}
else
{
	$sql = "insert into useri(nume_user, prenume_user, username, password, email, adresa) values 
	('".$nume."','".$prenume."','".$username."','".$parola."','".$email."','".$adresa."')";
	$resursa = $db->query($sql);
	print 'Contul a fost creat cu succes!';
}

}

?>
</div>
</div>
<?php

require_once('class.phpmailer.php');
//require_once('class.pop3.php');
//require_once('class.smtp.php');

$message="Contul dvs. a fost creat!";

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
	$mail->Subject = "Cont creat";
	$mail->AltBody = "Cont creat!";
	$mail->send();

}catch(phpmailerException $e){
echo $e->errorMessage();
}catch(Exception $e){
echo $e->getMessage();
}

include ("page_bottom.php");
?>
