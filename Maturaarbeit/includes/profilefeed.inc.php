<h1>Meine Aktivitäten</h1>
<?php
  session_start();
  if(isset($_SESSION['id'])){
    include '../db.php';
    $id = $_SESSION['id'];
    function resultToArray($result) {
      $rows = array();
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return $rows;
    }

    // Usage
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
    $result = $conn->query($sql);
    $rows = resultToArray($result);
    //var_dump($rows); // Array of rows
    $result->free();

    //print_r($rows);
    foreach($rows as $row) {
      foreach($row as $activity){
        echo $activity."<br />";
      }
      echo "<br />";
    }
  }else{
    echo "not logged in";
    //header("Location: ../index.php");
  }

?>
