<?php
  $title = "Hi";
  include 'header.php';
  include 'db.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id='$id'"
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr == 0){
    echo "fehlerhafter Link";
  }
?>
<h1>Passwort vergessen</h1>
<form action= "includes/passwordResetForm.inc.php" method="post">
  <input class="start" type="password" name="password" placeholder="Passwort"><br>
  <input class="start" type="password" name="confirmpassword" placeholder="Passwort bestätigen"><br>
  <input class="start" type="submit" name="reset" value="Passwort zurücksetzen"><br><br>
</form>
<?php
  include 'footer.php';
?>