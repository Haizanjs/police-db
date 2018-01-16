<?php
//error_reporting(E_ALL);
ini_set('display_errors',0);
ini_set('display_startup_errors',0);
define('HOST', "51.254.139.71");
define('USER', "A3L_PoliceDB");
define('PASS', "H4rM`7V==tE6_7U.");
define('DB', "A3L_PoliceDB");

function genPDO($DB = DB, $user = USER, $pass = PASS, $host = HOST) {
	$pdo = new PDO("mysql:host=".$host.";dbname=".$DB, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $pdo;
}

$pdo = genPDO();
?>