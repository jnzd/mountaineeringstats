<?php
  include '../header.php';
  include '../db.php';
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  //stores the current database entries
  $pic_path_old = $row['pic_path'];
  $time = $row['dt_modified'];
  $changed = false;
  //if-Statements check wether certain changes were entered or not
  if(is_uploaded_file($_FILES['pic']['tmp_name'])){
    $extension = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
    $pic_path='profilepics/'.$username.".".$extension;
    if(preg_match("!image!", $_FILES['pic']['type'])){
      $pic_path_inc = '../'.$pic_path;
      if($pic_path_old != "profilepics/standard.png"){
        unlink('../'.$pic_path_old);
      }
      copy($_FILES['pic']['tmp_name'], $pic_path_inc);
      $im = imagecreatefromstring($pic_path_inc);
      $size = min(imagesx($im), imagesy($im));
      $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
      if ($im2 !== FALSE) {
          $profilepic = imagejpeg($im2);
      }
      $changed = true;
    }else{
      $_SESSION['error'] = "Datei ist kein Bild.";
      header("location: ../settings.php?sub=profilepic");
    }
  }
  if($changed){
    $time = date("Y-m-d H:i:s");
    $sql = "UPDATE users SET pic_path='$pic_path', dt_modified='$time' WHERE id = '$id'";
    $result = $conn->query($sql);
    $_SESSION['error'] = "Profilbild geändert";
    header("Location: ../settings.php?sub=profilepic");
  }
  imagecreatefromstring();
  $im = imagecreatefromstring('example.png');
  $size = min(imagesx($im), imagesy($im));
  $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
  if ($im2 !== FALSE) {
      imagejpeg($im2, 'example-cropped.png');
  }
  
  //Your Image
  $imgSrc = "image.jpg";
  //getting the image dimensions
  list($width, $height) = getimagesize($imgSrc);
  //saving the image into memory (for manipulation with GD Library)
  $myImage = imagecreatefromjpeg($imgSrc);
  // calculating the part of the image to use for thumbnail
  if ($width > $height) {
    $y = 0;
    $x = ($width - $height) / 2;
    $smallestSide = $height;
  } else {
    $x = 0;
    $y = ($height - $width) / 2;
    $smallestSide = $width;
  }
  // copying the part into thumbnail
  $thumbSize = $smallestSide;
  $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
  imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);
  //final output
  header('Content-type: image/jpeg');
  imagejpeg($thumb);
?>
