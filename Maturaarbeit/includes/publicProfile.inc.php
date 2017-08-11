<?php
  $sql = "SELECT * FROM users WHERE username='$publicUser'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title=$row['username'];
  $id = $row['id'];
?>
<div id="profileheader">
  <img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120">
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
        echo "<h1><a class='actTitle' href='../activityPublic.php?name=".$filename."'>".$title."</a></h1><br />";
        echo "<p>".$description."</p><br />";
        gpx($row['actPath']);
      }
    }else{
      echo "<h2>Dieser User hat noch keine Aktivitäten hochgeladen</h2>";
    }
  ?>
  </div>
</body>
</html>
