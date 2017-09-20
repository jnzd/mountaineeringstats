<?php
  session_start();
  include '../db.php';
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $id = $_SESSION['userID'];
  if($_POST['password'] != $_POST['confirmpassword']){
    $_SESSION['error'] = "Passwörter stimmen nicht überein";
    header("location: ../passwordResetForm.php?id=".$id);
  }else{
    $_SESSION['error'] = "";
    $sql = "UPDATE users SET password='$password', resetHash=NULL WHERE id='$id'";
    $result = $conn->query($sql);
    //$_SESSION['id'] = $id;
    header("location: ../index.php");
  }
?>