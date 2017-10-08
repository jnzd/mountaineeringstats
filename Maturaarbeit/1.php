<?php
	$x = "a ";
	if(preg_match('/^[\w\.]+$/', $x)){
		echo "space";
	}
	if(!preg_match('/^[\w\.]+$/', $x)){
		echo "space2";
	}
	if(preg_match('/^[\W\.]+$/', $x)){
		echo "space3";
	}
	if(!preg_match('/^[\W\.]+$/', $x)){
		echo "space4";
	}
?>