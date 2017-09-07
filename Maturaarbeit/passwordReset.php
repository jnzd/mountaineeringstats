<?php
  $title = "Hi";
  include 'header.php';
  include 'db.php';
?>
<h1>Passwort vergessen</h1>
<form action= "includes/passwordReset.inc.php" method="post">
  <input class="start" type="email" name="email" placeholder="E-Mail"><br>
  <!--<input type="checkbox" name="remember" value="remmber"><label>Angemeldet bleiben</label><br>-->
  <input class="start" type="submit" name="reset" value="Passwort zurücksetzen"><br><br>
</form>
<?php
  include 'footer.php';
?>