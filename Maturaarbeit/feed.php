<?php
$title="Feed";
include 'header.php';
include 'db.php';
?>


	<canvas class="chart" id="myChart" width="400" height="400"></canvas>
	<script src="node_modules/chart.js/dist/Chart.js"></script>
	<script src="javascript/linechart.js"></script>

	<!--
	<h1>Feed</h1>
  	<h1>XMLHttpRequest</h1>
	<p>change</p>
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
	-->
</body>
</html>
