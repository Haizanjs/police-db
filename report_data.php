<!doctype html>
<?php
require_once("php_includes/base.inc.php");
$isCmd = hasPerm("pdcmd");
if(!$isCmd){
	redirect("/index.php");
	die();
}


if(!isset($_POST['crim'])) redirect("crime.php");

if(isset($_POST['crim'])) $crim = trim($_POST['crim']);

if(empty($crim)) redirect("crime.php");

$crid = getCiv($crim);
$cop = getUser($crim);
if(!$crid) $crid = createCiv(ucwords($crim));
$crim = $crid['name'];
sCiv($crid['id']);

if(empty($_POST['bailbond'])) $_POST['bailbond'] = 0;

if(!isset($_SESSION['arrandom'])) $_SESSION['arrandom'] = $_POST['random']+10;

if(isset($_POST['crime']) && !empty($_POST['crime']) && $_POST['random'] != $_SESSION['arrandom']) {
	$arr = newArrest($crid['id'], $_POST['crime'], $_POST['evi'], $_POST['time'], $_POST['date'], $_POST['ibail'], safeNum($_POST['bailbond']));
	$_SESSION['arrandom'] = $_POST['random'];
}

if(isset($_COOKIE["LSTZ"])){
	$usrTZ = htmlspecialchars($_COOKIE["LSTZ"]);
}else{
	$usrTZ = "UTC";
}

$cminfo = getInfo("cminfo");
$cminfo = json_decode($cminfo['data'], true);
?>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title><?php echo $cminfo['pda']; ?> - Criminal Database</title>
		<meta name="description" content="<?php echo $cminfo['pdn']; ?> - Criminal Information">
		<meta name="author" content="Cole, Scott Harm (Retired)">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicons -->
		<link rel="shortcut icon" href="img/favicons/favicon.png">
		<link rel="apple-touch-icon" href="img/favicons/icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/favicons/72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/favicons/114x114.png">
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300|Muli:300" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/idangerous.swiper.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/ticker.css">
		
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>
	<body>
		<div id="overlay"></div>
		<div id="top">
			<a href="#" id="sidebar-button"></a>
			<header id="logo">
				<img src="img/logo.png" alt="Logo">
			</header>
		</div>
		<div id="main-wrapper">
			<?php require_once("boloTicker.php"); ?>
			<div id="content" style=" background: url(img/slides/front.png) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
				<div class="container-fluid">
					<div id="heading" class="row">
						<div class="col-12">
							<header>
								<h1>Viewing Training Report</h1>
								<h2>Mess up a crime? Please tell Heisen for now.</h2>
							</header>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="alert alert-warning fade in">
												<i class="fa fa-exclamation-triangle"></i>
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<p>This page is a work in progress, please come back later once it's finished.</p>
											</div>
							<article class="inner">
								<div class="row">
									<div class="col-12">
                                    <?php 
										$totalArr = getArrests($crid['id']); $numerArr = count($totalArr);
										$totalWrr = getWarrants($crid['id']); $numerWrr = count($totalWrr);
									?>
										<h4>View/Change/Add Training Report - <?php echo ucwords($crim);  ?> 
										<br>
											
										</h4>
									</div>
								</div>
                              <form id="post-comment" class="inner" action="queryDB.php" method="post">
								 <div class="row">
									
										<div class="form-group col-2">
										  <label for="time">Training<span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="time" placeholder="Type e.g. Academy" class="form-control" id="time" required >
											<input type="hidden" name="random" value="">
						   		  		</div>
										<div class="form-group col-2">
										  <label for="time">Training Officer<span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="time" placeholder="FTO, e.g. Spencer Lannister" class="form-control" id="time" required >
											<input type="hidden" name="random" value="">
						   		  		</div>
                                        <div class="form-group col-2">
										  <label for="date">Date <span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="date" required value="<?php echo date("Y-m-d"); ?>" placeholder="yyyy-mm-dd" class="form-control" id="date">
								   		</div>
								   		<div class="form-group col-1">
								   		  
								   		    <label>
								   		      <input type="radio" checked name="ibail" value="Bail" id="RadioGroup1_0" class="form-control">
								   		      Completed</label>
								   		    <label>
								   		      <input name="ibail" type="radio" id="RadioGroup1_1" value="Bond" class="form-control">
								   		      Failed</label>
								   		    <br>
							   		      <div>
                                   </div>
                                   		
								</div>
                                <button type="submit" class="btn btn-color"><i class="glyphicon glyphicon-send"></i>Add Training Report</button>
							  </form><center>
							  <?php
							  $training = true;
							  if($training) {
							  ?>
							<?php } else echo "No training reports found."; ?></center>
							</article>
						</div>
					</div>
				</div>
			</div>
			<?php require_once("sidebar.php"); ?>
				<footer>
					<p class="copyright">&copy; Copyright 2017 <a href="http://coltonbrister.com" target="_blank">Colton Brister</a></p>
				</footer>
			</div>
		</div>

		<!-- JavaScripts -->
		<script type='text/javascript' src='js/jquery.min.js'></script>
		<script type='text/javascript' src='js/bootstrap.min.js'></script>
		<script type='text/javascript' src='js/swiper/idangerous.swiper.min.js'></script>
		<script type='text/javascript' src='js/masonry/masonry.pkgd.min.js'></script>
		<script type='text/javascript' src='js/isotope/jquery.isotope.min.js'></script>
		<script type='text/javascript' src='js/custom.js'></script>
		<script type="text/javascript" src="js/ticker.js"></script>
	</body>
</html>