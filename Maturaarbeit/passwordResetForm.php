<?php
  $title = "Hi";
  include 'header.php';
  include 'db.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr == 0){
    echo "fehlerhafter Link";
  }else{
    $row = $result->fetch_assoc();
    $_SESSION['userID'] = $id;
    $email = $row['email'];
?>
  <div class="outer">
    <div class="middle">
      <div class="inner">
			<h1 class="start">Mountaineeringstats</h1>
        <h1 class="start">Passwort vergessen</h1>
        <p>Passwort für <?php echo $email; ?> zurücksetzen</p>
        <div id="error">
          <?php
            if(isset($_SESSION['error'])){
              echo $_SESSION['error'];
            }
          ?>
        </div>
        <form action= "includes/passwordResetForm.inc.php" method="post">
          <input class="start" type="password" name="password" placeholder="Passwort"><br>
          <input class="start" type="password" name="confirmpassword" placeholder="Passwort bestätigen"><br>
          <input class="start" type="submit" name="reset" value="Passwort zurücksetzen"><br><br>
        </form>
      </div>
   </div>
  </div>
<?php
  }
  include 'footer.php';
?>