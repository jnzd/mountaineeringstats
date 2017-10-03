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
<h1>Aktivität bearbeiten</h1>
<div class="upload">
	<form action="includes/editAct.inc.php" method="post" enctype="multipart/form-data">
		<div class="settingsBlock">
			<label class="settingsLabel" for="title">Titel</label>
			<input class="uploadInput" type="text" id="title" name="title" placeholder="Titel" value="<?php echo $title;?>"><br>
		</div>
		<div class="settingsBlock">
			<label class="settingsLabel" for="description">Beschreibung</label>
			<input class="uploadInput" type="text" id="description" name="description" placeholder="Beschreibung" value="<?php echo $description;?>"><br>
		</div>
			<input type="hidden" value="<?php echo $name;?>" name="name"/>
		<div class="settingsBlock">
			<label class="settingsLabel" for="sport">Sportart</label>
			<select id="sport" name="sport">
				<option selected="selected" value="<?php echo $sport;?>">Wähle eine Sportart</option>
				<option value="jogging">Joggen</option>
				<option value="hiking">Wandern</option>
				<option value="biking">Biken</option>
				<option value="skiing">Skifahren</option>
				<option value="skitour">Skitour</option>
				<option value="hochtour">Hochtour</option>
			</select><br>
		</div>
		<input class="uploadInput" type="submit" name="safe" value="speichern"><br><br>
	</form>
</div>
<?php
  include 'footer.php';
?>