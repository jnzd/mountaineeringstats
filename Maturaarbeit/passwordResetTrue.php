<?php
  $title = "mountaineeringstats | Wilkommen";
  include 'header.php';
  include 'db.php';
?>
<h1 >Mountaineeringstats</h1>
<h1 >Passwort vergessen</h1>
<div id="error">
  <?php
    if(isset($_SESSION['error'])){
      /**
        * display form error from previous try
        */
      echo $_SESSION['error'];
    }
  ?>
</div>
<form action= "includes/passwordReset.inc.php" method="post">
  <input type="email" name="email" placeholder="E-Mail"><br>
  <!--<input type="checkbox" name="remember" value="remmber"><label>Angemeldet bleiben</label><br>-->
  <input type="submit" name="reset" value="Passwort zurücksetzen"><br><br>
</form>
<?php
  include 'footerStart.php';
?>