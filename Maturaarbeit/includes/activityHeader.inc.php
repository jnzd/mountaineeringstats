<?php
  include 'db.php';
  include 'parsers/parse.gpx.php';
  $name = $_GET['name'];
  $sql = "SELECT * FROM activities WHERE filename='$name'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title = $row['title'];
  $actid = $row['id'];
  $sport = $row['sport'];
  $path = $row['actPath'];
  $type = $row['type'];
  $actTime = $row['actTime'];
  $description = $row['description'];
?>
<div class='actHeader'>
  <div class='title'>
    <h1><?php echo $title; ?></h1><br>
  </div>
  <?php
      include 'includes/icons.inc.php';
  ?>
  <div class="actDescription">
    <p><?php echo $description; ?></p>
  </div>
