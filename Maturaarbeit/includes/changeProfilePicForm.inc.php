<form class="settings" action="includes/changeProfilePic.inc.php" method="post" enctype="multipart/form-data">
  <div class="settingsBlock">
    <input type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
    <label class="settingsLabel" for="pic">Profilbild</label>
    <input type="file" id="pic" name="pic" placeholder="Profilbild"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="safe"></label>
    <input type="submit" id="safe" name="safe" value="speichern"><br><br>
  </div>
  <a class="settings" href="includes/deletePic.inc.php">Profilbild löschen</a>
</form>