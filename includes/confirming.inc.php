<?php
include '../db.php';
$username = $_GET['username'];
$confirm_code = $_GET['code'];
$sql = "SELECT * FROM users WHERE username='$username' AND confirm_code='$confirm_code'";
$result = $conn->query($sql);
//Confirmation link invalid
if(!$row = $result->fetch_assoc()){
  echo $sql;
  echo "<br />";
  echo $username;
  echo "<br />";
  echo $confirm_code;
  header("Location: index.php");
//confirmation link valid
}else{
  $time = date("Y-m-d H:i:s");
  $sql = "UPDATE users SET confirmed='1', dt_created= '$time' WHERE username = '$username'";
  $result = $conn->query($sql);
  session_start();
  header("Location: ../confirmed.php");
}
?>
