<?php
  $publicUser = $_SESSION['publicUser'];
  $sql = "SELECT * FROM users WHERE username='$publicUser'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title=$row['username'];
  $id = $row['id'];
?>
<img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120">
<div id="profileheader">
	<h1>
	<?php
		echo $publicUser;
	?>
	</h1>
	<div id="bio">

	</div>
</div>

<div id="feed">
  <?php
    include 'parsers/parse.preview.gpx.php';
    function resultToArray($result) {
      $rows = array();
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return $rows;
    }
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
    $result = $conn->query($sql);
    $rownr = $result->num_rows;
    if($rownr>0){
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
        echo "<h1><a class='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1><br />";
        echo "<p>".$description."</p><br />";
        gpx($row['actPath']);
        echo "<a href='includes/deleteAct.inc.php'>Aktivität löschen</a>";
        echo "<br />";
      }
    }else{
      echo "<h2>Dieser User hat noch keine Aktivitäten hochgeladen</h2>";
    }
  ?>
  </div>
</body>
</html>
