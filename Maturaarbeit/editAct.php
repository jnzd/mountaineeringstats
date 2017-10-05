<?php
  include 'header.php';
  include 'db.php';
	$randomid = $_GET['id'];
  $sql = "SELECT * FROM activities WHERE randomID='$randomid'";
  $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$postingid = $row['user_id'];
	if($_SESSION['id']!=$postingid){
		header("location: index.php");
	}
  $sport = $row['sport'];
  $title = $row['title'];
  $description = $row['description'];
?>
<div class="upload">
	<h1>Aktivität bearbeiten</h1>
	<form action="includes/editAct.inc.php" method="post" enctype="multipart/form-data">
		<div class="settingsBlock">
			<label class="settingsLabel" for="title">Titel</label>
			<input class="uploadInput" type="text" id="title" name="title" placeholder="Titel" value="<?php echo $title;?>" autocomplete="off"><br>
		</div>
		<div class="settingsBlock">
			<label class="settingsLabel" for="description">Beschreibung</label>
			<input class="uploadInput" type="text" id="description" name="description" placeholder="Beschreibung" value="<?php echo $description;?>" autocomplete="off"><br>
		</div>
		<input type="hidden" value="<?php echo $randomid;?>" name="id"/>
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