<?php
$title="Karte";
include 'header.php';
include 'db.php';
?>

	<h1>Test</h1>

	<!-- Ajax test -->
  <h1>XMLHttpRequest</h1>

	<p id="demo">change</p>

	<button type="button" onclick="loadDoc()">Change Content</button>

	<script>
		function loadDoc(){
			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					document.getElementById("demo").innerHTML = this.responseText;
				}
			};

			xhttp.open("GET", "ajax_info.txt", true);
			xhttp.send();
		}
	</script>
	<br>

</body>
</html>
