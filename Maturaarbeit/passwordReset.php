<?php
  $title = "Hi";
  include 'header.php';
  include 'db.php';
?>
<div class="outer">
  <div class="middle">
    <div class="inner">
      <h1>Passwort vergessen</h1>
      <div id="error">
        <?php
          if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
          }
        ?>
      </div>
      <form action= "includes/passwordReset.inc.php" method="post">
        <input class="start" type="email" name="email" placeholder="E-Mail"><br>
        <!--<input type="checkbox" name="remember" value="remmber"><label>Angemeldet bleiben</label><br>-->
        <input class="start" type="submit" name="reset" value="Passwort zurücksetzen"><br><br>
      </form>
    </div>
  </div>
</div>
<?php
  include 'footer.php';
?>