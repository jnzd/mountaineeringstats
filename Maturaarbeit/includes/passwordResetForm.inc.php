<?php
  
  $password = md5($_POST['password']);

  if($_POST['password'] != $_POST['confirmpassword']){
    $_SESSION['error'] = "Passwörter stimmen nicht überein";
    header("location: ../passwordReset.php");
  }else{

  }

?>