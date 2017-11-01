<form class="settings" action="includes/settings.inc.php" method="post" enctype="multipart/form-data">
  <div class="settingsBlock">
    <label class="settingsLabel" for="username">Benutzername</label>
    <input class="settingsInput" type="text" id="username" name="username" placeholder="Benutzername" value="<?php echo $username; ?>"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="email">E-Mail</label>
    <input class="settingsInput" type="email" id="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="safe"></label>
    <input type="submit" id="safe" name="safe" value="speichern"><br><br>
  </div>
  <a class="delete settings" href="includes/delete.inc.php">Account löschen</a>
</form>