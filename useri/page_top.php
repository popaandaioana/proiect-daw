<?php
@session_start();
$sql = "select * from useri where username = '".$_SESSION['username']."' and password = '".$_SESSION['parola']."'";
$resursa=$db->query($sql);
$row = $resursa->fetch_object();


$_SESSION['id_user']=$row->id_user;
$_SESSION['nume_user']=$row->nume_user;
$_SESSION['prenume_user']=$row->prenume_user;
$_SESSION['email']=$row->email;
$_SESSION['adresa']=$row->adresa;




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Libraria Anda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body bgcolor = "#ffffff">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
	<img src = "../img/logo.jpg">
</div>


<div class="col-md-3">
  <form action="cauta.php" method = "POST">
      <input type="text" placeholder="cauta" name="cauta">
    <button type="submit" class="btn btn-outline-primary"><img src = "img/cauta.png"></button>
  </form>
</div>

<div class="col-md-1">
Cos <a href = "cos.php" ><img src = "img/cos.png"></a>
</div>

<div class="col-md-2">
<?php echo "Bun venit, user ".$row->prenume_user."!" ?>
</div>

<div class="col-md-3">

<form action="../index.php" method = "POST">
  <INPUT type = "hidden" name = "deconectare" value = "1">
  <img src = "../img/deconectare.png"><input type="Submit" class="btn btn-light" value="Deconectare">
</form>
</div>
</div>


<div class="row">
<div class="col-12">
<nav class="navbar navbar-expand-sm bg-light">
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Acasa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="promotii.php">Promotii</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
</nav>
</div>
</div>



<div class="row">
<div class="col-12">
<nav class="navbar navbar-expand-sm bg-light">
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="date_cont.php">Date cont</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comenzi_onorate.php">Comenzile mele onorate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comenzi_neonorate.php">Comenzile mele neonorate</a>
      </li>
    </ul>
</nav>
</div>
</div>
