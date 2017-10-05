<?php
  include '../db.php';
  $randomid = $_POST['id'];
  $sql = "SELECT * FROM activities WHERE randomID='$randomid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $sport = $row['sport'];
  include '../db.php';
  if($_POST['sport'] != "null"){
    if($_POST['sport'] == "jogging"){
      $sport="jogging";
    }
    if($_POST['sport'] == "hiking"){
      $sport="hiking";
    }
    if($_POST['sport'] == "biking"){
      $sport="biking";
    }
    if($_POST['sport'] == "skiing"){
      $sport="skiing";
    }
    if($_POST['sport'] == "hochtour"){
      $sport="hochtour";
    }
    if($_POST['sport'] == "skitour"){
      $sport="skitour";
    }
  }
  if(isset($_POST['title'])){
    $title=$_POST['title'];
  }else{
    $title=$row['title'];
  }
  if(isset($_POST['description'])){
    $description=$conn->real_escape_string($_POST['description']);
  }else{
    $description="";
  }
  $sql = "UPDATE activities SET title='$title', description='$description', sport='$sport' WHERE randomID='$randomid'";
  $result = $conn->query($sql);
	$_SESSION['uploadError']="";
	header("Location: ../activity.php?id=".$randomid);
?>
