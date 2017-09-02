<?php
  include 'header.php';
  include 'db.php';
	$name = $_GET['name'];
  $sql = "SELECT * FROM activities WHERE filename='$name'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $sport = $row['sport'];
  $title = $row['title'];
  $description = $row['description'];
?>
<div id="upload">
	<form action="includes/editAct.inc.php" method="post" enctype="multipart/form-data">
		<input class="upload" type="text" name="title" placeholder="Titel" value="<?php echo $title;?>"><br>
		<input class="upload" type="text" name="description" placeholder="Beschreibung" value="<?php echo $description;?>"><br>
		<input type="hidden" value="<?php echo $name;?>" name="name"/>
		<select name="sport">
			<option selected="selected" value="<?php echo $sport;?>">Wähle eine Sportart</option>
			<option value="jogging">Joggen</option>
			<option value="hiking">Wandern</option>
			<option value="biking">Biken</option>
			<option value="skiing">Skifahren</option>
			<option value="skitour">Skitour</option>
			<option value="hochtour">Hochtour</option>
		</select><br>
		<input class="upload" type="submit" name="safe" value="speichern"><br><br>
	</form>
</div>
<?php
  include 'footer.php';
?>