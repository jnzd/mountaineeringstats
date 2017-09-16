<div class="sportIcon">
	<?php
	if($sport=="skiing"){
			$path="icons/skiing.png";
		}elseif($sport=="hiking"){
			$path="icons/hiking.png";
		}elseif($sport=="snowboard"){
			$path="icons/snowboard.png";
		}elseif($sport=="skitour"){
			$path="icons/skiing.png";
		}elseif($sport=="hochtour"){
			$path="icons/hochtour.png";
		}elseif($sport=="jogging"){
			$path="icons/jogging.png";
		}elseif($sport=="biking"){
			$path="icons/bike.png";
		}
	?>
	<img src="<?php echo $path; ?>" height="24" width="24">
</div>