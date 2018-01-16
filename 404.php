<!doctype html>
<?php 

$cminfo = getInfo("cminfo");
$cminfo = json_decode($cminfo['data'], true);

?>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title><?php echo $cminfo['pda']; ?> - 404 Error</title>
		<meta name="description" content="<?php echo $cminfo['pdn']; ?> - 404">
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
			<div id="content" style=" background: url(img/slides/front.png) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
				<div class="container-fluid">
					<div id="heading" class="row">
						<div class="col-12">
							<header>
								<h1>Error 404</h1>
								<h2>Page not found</h2>
							</header>
						</div>
					</div>
					<div class="row">
						<div class="main-column col-12">
							<div class="inner">
								<div class="row">
									<div class="col-6">
										<p>The page you have requested does not exists.</p>
										<p>Perhaps you are here because:</p>
										<ul class="fa-ul">
											<li><i class="fa-li fa fa-angle-right"></i>The page has moved</li>
											<li><i class="fa-li fa fa-angle-right"></i>The page is deleted</li>
											<li><i class="fa-li fa fa-angle-right"></i>You like 404 pages</li>
										</ul>
									</div>
								</div>
							</div>
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
	</body>
</html>