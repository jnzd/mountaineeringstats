<h1>Meine Aktivitäten</h1>
<?php
  //session_start();
  if(isset($_SESSION['id'])){
    //include '../db.php';
    //include '../parsers/parse.gpx.php';
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
      $actid = $row['id'];
      $path = $row['path'];
      gpx($row['actPath']);
      foreach($row as $activity){
        echo $activity."<br />";
      }
      echo $actid;
      echo "<br />";
      echo "<a href='includes/deleteAct.inc.php'>Aktivität löschen</a>";
      echo "<br />";
    }
  }else{
    echo "not logged in";
  }
?>
