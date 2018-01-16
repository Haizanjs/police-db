<?php
	require_once("php_includes/base.inc.php");
	
	echo "querying update to database";
	
	$updateExp = updatetraining($_POST[(["copm",3])]);
?>