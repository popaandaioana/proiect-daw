<?php
session_start();
include ("autorizare.php");
$sql = "select * from admini where username = '".$_SESSION['username']."' and password = '".$_SESSION['parola']."'";
$resursa=$db->query($sql);
$row = $resursa->fetch_object();

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
<div class="col-md-6">
	<img src = "../img/logo.jpg">
</div>

<div class="col-md-3">
<?php echo "Bun venit, admin ".$row->prenume_admin."!" ?>
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
        <a class="nav-link" href="adauga.php">Adauga</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="modifica_sterge.php">Modifica sau sterge</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comenzi_onorate.php">Comenzi onorate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comenzi_neonorate.php">Comenzi neonorate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="carti_stoc_epuizat.php">Carti stoc epuizat</a>
      </li>
    </ul>
</nav>
</div>
</div>
