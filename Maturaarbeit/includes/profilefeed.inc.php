<h1>Meine Aktivitäten</h1>
<?php
  //session_start();
  if(isset($_SESSION['id'])){
    include 'parsers/parse.gpx.php';
    $id = $_SESSION['id'];
    function resultToArray($result) {
      $rows = array();
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return $rows;
    }
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
    $result = $conn->query($sql);
    $rows = resultToArray($result);
    $result->free();

    foreach($rows as $row) {
      $title = $row['title'];
      $actid = $row['id'];
      $sport = $row['sport'];
      $path = $row['actPath'];
      $type = $row['type'];
      $actTime = $row['actTime'];
      $filename = $row['filename'];
      $description = $row['description'];
      echo "<h1><a clas='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1><br />";
      echo "<p>".$description."</p><br />";
      gpx($row['actPath']);
    }
  }
?>
