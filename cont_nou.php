<?php
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
?>
<div class="col-8">


<div class="container">
  <form action="login_new.php" method = "POST">
    <div class="row">
      <div class="vl">
        <span class="vl-innertext">Cont nou</span><br><br>
      </div>
	<div class="col">
        <div class="hide-md-lg">
        </div>
	Nume<br><input type="text" name="nume"><br>
	Prenume<br><input type="text" name="prenume"><br>
	Email<br><input type="text" name="email"><br>
	Adresa<br><input type="textarea" name="adresa"><br>
        Username<br><input type="text" name="username"><br>
        Parola<br><input type="password" name="parola"><br><br>
        <input type="submit" value="Creare cont"><br><br>
      </div>

    </div>
  </form>
</div>





</div>
</div>
<?php
include ("page_bottom.php");
?>

