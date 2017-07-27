<?php
  include '../db.php';
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $pic_path = $row['pic_path'];
  if($pic_path != profilepics/standard.png){
    unlink($pic_path);
  }
  //remove useer from database
  $sql = "DELETE FROM users WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  session_destroy();
  header("location: ../start.php");
?>
