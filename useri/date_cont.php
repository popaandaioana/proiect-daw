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
        <span class="vl-innertext">Detalii cont</span><br><br>
      </div>
	<div class="col">
        <div class="hide-md-lg">
        </div>
	Nume<br><input type="text" name="nume" value="<?php print $_SESSION['nume_user']?>"><br>
	Prenume<br><input type="text" name="prenume" value="<?php print $_SESSION['prenume_user']?>"><br>
	Email<br><input type="text" name="email" value="<?php print $_SESSION['email']?>"><br>
	Adresa<br><input type="textarea" name="adresa" value="<?php print $_SESSION['adresa']?>"><br>
        Username<br><input type="text" name="username" value="<?php print $_SESSION['username']?>"><br>
        Parola<br><input type="text" name="parola" value="<?php print $_SESSION['parola']?>"><br><br>
        <input type="submit" value="Modifica"><br><br>
      </div>

    </div>
  </form>
</div>





</div>
</div>
<?php
include ("page_bottom.php");
?>

