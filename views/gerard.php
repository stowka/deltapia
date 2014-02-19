<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="The Delta Piano Trio website">
		<meta name="keywords" content="Delta, Piano, Trio, DPT, Irene, Enzlin, 
			Vera, Kooper, Gerard, Spronk, Music, Classical, Violin, Cello, 
			Strings, Salzburg, Amsterdam, Austria, Holland, Netherlands, 
			Basel, Switzerland">
		<meta name="author" content="Antoine De Gieter">

		<title><?php print PAGE_TITLE; ?></title>
		<?php include_once "global/ressources/links.php"; ?>
	</head>

	<body>
		<img src="global/img/logos/logo-black-shadow.png" class="logo-sm hidden-xs hidden-sm">
		<div class="padded visible-xs visible-sm"></div>
		
		<section class="padded">
			<div class="row">
				<div class="col-md-1 col-lg-1">
					<span class="pull-right"><a href="?_=about" class="no-style arrow"><span class="glyphicon glyphicon-arrow-left"></span></a></span>
				</div>

				<div class="col-md-10 col-lg-10">
					<h3 class="text-center">
						Gerard Spronk<br>
						<br>
						<img src="global/img/members/gerard.jpg" width="160px" class="img-thumbnail">
						<br>
					</h3>

					<div class="padded"></div>

					<p class="text-justify helvultra">
						<?php print preg_replace( "#<br />#", "<br><br>", nl2br( $gerard['cv'] ) ); ?>
					</p>
				</div>

				<div class="col-md-1 col-lg-1"></div>
			</div>
		</section>

		<?php require_once "sections/flags.php"; ?>

		<?php require_once "sections/menu.php"; ?>

		<?php include_once "global/ressources/js.php"; ?>
	</body>
</html>