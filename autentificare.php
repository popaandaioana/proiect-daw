<?php
session_start();
include ("conectare_bd.php");
include ("page_top.php");
include ("meniu.php");
?>
<div class="col-8">


<div class="container">
  <form action="login.php" method = "POST">
    <div class="row">
      <div class="vl">
        <span class="vl-innertext">Autentificare</span><br><br>
      </div>
	<div class="col">
        <div class="hide-md-lg">
        </div>
        Username<br><input type="text" name="username"><br>
        Parola<br><input type="password" name="parola"><br><br>
        <input type="Submit" name="submit" value="Login"><br>
      </div>

    </div>
  </form>
</div>





</div>
</div>
<?php
include ("page_bottom.php");
?>

