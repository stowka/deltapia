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
				<div class="col-md-1 col-lg-1"></div>
				<div class="col-md-10 col-lg-10">
					<h3 class="text-center">
						<?php print $site['repertoire']; ?>
					</h3>

					<div class="padded"></div>
					
					<p class="text-left introduction-repertoire">
						<?php print $repertoire['introduction']; ?>
					</p>

					<p class="text-center introduction-repertoire">
						<a data-toggle="collapse" class="no-style arrow" data-parent="#repertoire" href="#repertoire">
							<span class="glyphicon glyphicon-resize-vertical"></span>
						</a>
					</p>

					<div class="panel-collapse collapse" id="repertoire">
						<p class="text-justify helvultra">
							<?php print nl2br( $repertoire['repertoire'] ); ?>
						</p>
					</div>
				</div>
				<div class="col-md-1 col-lg-1"></div>
			</div>
		</section>

		<?php require_once "sections/flags.php"; ?>

		<?php require_once "sections/menu.php"; ?>
		
		<?php include_once "global/ressources/js.php"; ?>
	</body>
</html>