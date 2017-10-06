<?php
  include '../header.php';
  include '../db.php';
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $pic_path = $row['pic_path'];
  $time = date("Y-m-d H:i:s");
  $changed = false;
  //if-Statements check wether certain changes were entered or not
      if($pic_path != "profilepics/standard.png"){
        unlink($pic_path);
        $pic_path = "profilepics/standard.png";
        $changed = true;
      }
  if($changed){
    $sql = "UPDATE users SET pic_path='$pic_path', dt_modified='$time' WHERE id = '$id'";
    $result = $conn->query($sql);
  }
  header("Location: ../profile.php");
?>