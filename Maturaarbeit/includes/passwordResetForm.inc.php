<?php
  session_start();
  include '../db.php';
  $password = md5($_POST['password']);
  $id = $_SESSION['userID'];
  if($_POST['password'] != $_POST['confirmpassword']){
    $_SESSION['error'] = "Passwörter stimmen nicht überein";
    header("location: ../passwordResetForm.php?id=".$id);
  }else{
    
    $_SESSION['error'] = "";
    $sql = "UPDATE users SET password='$password' WHERE id='$id'";
    $_SESSION['id'] = $id;
    header("location: ../index.php");
  }

?>