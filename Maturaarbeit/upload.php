<?php
$title="GPX Upload";
include 'header.php';
include 'db.php';
include 'parsers/parse.gpx.php';
?>
<div class='upload'>
	<h1>GPX Upload</h1>
	<p>Hier kannst du deine GPX-Dateien hochladen. Solltest du noch keine GPX-Dateien haben kannst du diese mit Diensten wie <a href='https://www.strava.com'>Strava</a>, <a href='https://wwww.runkeeper.com'>Runkeeper</a>, <a href='https://www.endomondo.com'>Endomondo</a>, <a href='https://www.movescount.com'>Movescount</a> oder <a href='https://fit.google.com'>Google Fit</a> aufzeichnen oder bestehende Aktivitäten von dort exportieren.</p>
	<p>Wenn du GPS-Dateien in anderen Formaten als GPX hast kannst du diese mit <a href='http://www.gpsvisualizer.com/convert_input'>GPS Visualizer</a> versuchen zu konvertieren.</p>
</div>

<div class="upload">
	<div class="error">
		<?php
			if(isset($_SESSION['uploadError'])){
				echo $_SESSION['uploadError'];
			}
		?>
	</div>
	<form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
		<div class="uploadBlock">
			<label class="uploadLabel" for="title">Titel</label>
			<input class="uploadInput" id="title" type="text" name="title" placeholder="Titel"><br>
		</div>
		<div class="uploadBlock">
			<label class="uploadLabel" for="description">Beschreibung (optional)</label>
			<input class="uploadInput" id="description" type="text" name="description" placeholder="Beschreibung"><br>
		</div>
		<div class="uploadBlock">
			<label class="uploadLabel" for="sport">Sportart</label>
			<select name="sport">
				<option selected="selected" id="description" value="null">Wähle eine Sportart</option>
				<option value="jogging">Joggen</option>
				<option value="hiking">Wandern</option>
				<option value="biking">Biken</option>
				<option value="skiing">Skifahren</option>
				<option value="snowboard">Snowboard</option>
				<option value="skitour">Skitour</option>
				<option value="hochtour">Hochtour</option>
			</select><br>
		</div>
		<div class="uploadBlock">
			<input class="uploadInput" type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
			<label class="uploadLabel" for="xml">GPX-Datei</label>
			<input class="uploadInput" type="file" name="xml" id="xml" placeholder="Aktivität"><br>
		</div>
		<div class="uploadBlock">
			<label class="uploadLabel" for="upload"></label>
		<input class="uploadInput" id="upload" type="submit" name="upload" value="hochladen"><br>
		</div>
	</form>
</div>
<?php
  include 'footer.php';
?>
