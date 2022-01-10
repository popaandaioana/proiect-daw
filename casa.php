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
      <label>Nume</label>
      <input type="text" class="form-control" name="nume">
    </div>
    <div class="form-group col-md-6">
      <label>Prenume</label>
      <input type="text" class="form-control" name="prenume">
    </div>
     <div class="form-group col-md-6">
      <label>Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label>Adresa</label>
      <input type="text" class="form-control" name="adresa">
  </div>
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