<?php
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
include ("functii.php");
?>
<div class="col-md-10" class="responsive" class="container">

<form action = "comenzi.php" method = "POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nume: <?php print $_SESSION['nume_user']?></label>
    </div>
    <div class="form-group col-md-6">
      <label>Prenume: <?php print $_SESSION['prenume_user']?></label>
    </div>
     <div class="form-group col-md-6">
      <label>Email: <?php print $_SESSION['email']?></label>
    </div>
    <div class="form-group">
      <label>Adresa: <?php print $_SESSION['adresa']?></label></label>
    </div>
    <br>
  <button type="submit" class="btn btn-primary">Trimite comanda</button>
</form>  
<div>
      <?php print 'Total de plata: '.$_POST['total'].' lei'
      ?>
  </div>  
  

</div>


</div>
<?php
include ("page_bottom.php");
?>