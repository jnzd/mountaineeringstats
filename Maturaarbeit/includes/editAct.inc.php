<?php
  include '../db.php';
  $name = $_POST['name'];
  $sql = "SELECT * FROM activities WHERE filename='$name'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $sport = "";
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
    if(isset($_POST['description'])){
      $description=$_POST['description'];
    }else{
      $description="";
    }
  }else{
    
  }
  $sql = "UPDATE activities SET title='$title', description='$description', sport='$sport' WHERE filename = '$name'";
  $result = mysqli_query($conn, $sql);

	$_SESSION['uploadError']="";
	header("Location: ../activity.php?name=".$name);
?>
