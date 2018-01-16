<?php
require_once("php_includes/base.inc.php");
if(isLoggedIn() || checkRem()) {
	redirect("index.php");
	die();
}
if(isset($_POST['uname'])) {
	(isset($_POST['rememberme'])) ? $rmme = true : $rmme = false;
	$log = login($_POST['uname'], $_POST['pass'], $rmme);
	switch($log) {
		case 0:
		redirect("index.php");
		die();
		break;
		default:
//		echo "Invalid Username/Password";
		break;
	}
}

$cminfo = getInfo("cminfo");
$cminfo = json_decode($cminfo['data'], true);

?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $cminfo['pdn']; ?> Database - Secure Login</title>
<!-- CSS -->
<!--<link href="css/styleLogin.css" rel="stylesheet" type="text/css" media="all"/>-->
		<!-- CSS -->
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300|Muli:300" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/idangerous.swiper.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/ticker.css">
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Google Fonts-->
<link href='https://fonts.googleapis.com/css?family=Roboto:500,900italic,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
			<div id="content" style=" background: url(img/slides/front.png) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
</head>
<body>
<div align="center" class="container-fluid">
	<div class="login-top">
		<h6><?php echo $cminfo['pdn']; ?></h6>
		<br>
		<form method="post" action="login.php">
			<input type="text" name="uname" placeholder="Username" required>
			<input type="password" name="pass" placeholder="Password" required>
            <div id="remdiv">
              <input type="checkbox" name="rememberme" id="rem" checked>
              <label for="rem">Remember Me </label>
            </div>
			<div class="forgot">
				<input type="submit" value="Login">
			</div>
	    </form>
	</div>
	<div>
	<form action="register.php" method="get" id="form1">
	</form>
		<button type="submit" form="form1" value="Submit">Register</button>
	</div>
</div>	

</body>
</html>