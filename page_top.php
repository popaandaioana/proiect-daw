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
<div class="col-md-4">
	<img src = "img/logo.jpg">
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
Autentificare <a href = "autentificare.php"  data-bs-toggle="tooltip" title="Cont" ><img src = "img/login.png"></a>
</div>
<div class="col-md-2">
Cont nou <a href = "cont_nou.php"  data-bs-toggle="tooltip" title="Cont" ><img src = "img/cont.png"></a>
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
