<form class="settings" action="includes/changePassword.inc.php" method="post" enctype="multipart/form-data">
  <div class="settingsBlock">
    <label class="settingsLabel" for="oldpassword">Altes Passwort</label>
    <input type="password" id="oldpassword" name="oldpassword" placeholder="Altes Passwort"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="newpassword">Neues Passwort</label>
    <input type="password" id="newpassword" name="newpassword" placeholder="Neues Passwort"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="confirmpassword">Neues Passwort bestätigen</label>
    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Bestätige neues Passwort"><br>
  </div>
  <input type="submit" name="safe" value="speichern"><br><br>
  <a onclick="passwordreset()" href="#">Passwort vergessen</a>
</form>
<script src="javascript/passwordreset.js"></script>