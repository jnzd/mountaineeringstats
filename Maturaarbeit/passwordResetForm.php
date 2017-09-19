<?php
  $title = "mountaineeringstats | Wilkommen";
  include 'header.php';
  include 'db.php';
  if(isset($_GET['code'])&& isset($_GET['id'])){
    /**
     * retrieve data from url
     */
    $code = $_GET['code'];
    $id = $_GET['id'];
  }else{
    /**
     * if link doesn't contain the required info
     * redirect to index.php
     */
    header("location: ../index.php");
  }
  /**
   * verify data
   */
  $sql = "SELECT * FROM users WHERE id='$id' AND resetHash='$code'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows;
  if($rownr == 0){
    /*
     * if the link doesn't match with an id and a corresponding hash
     * redirect to index.php
     */
    header("location: index.php")
  }else{
    /**
     * if data is correct
     * display reset form
     */
    $row = $result->fetch_assoc();
    $_SESSION['userID'] = $id;
    $email = $row['email'];
    ?>
    <div class="startBackground">
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
    </div>
    <?php
  }
  include 'footer.php';
?>