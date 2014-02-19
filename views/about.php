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
				<div class="col-md-12 col-lg-12">
					<h3 class="text-center">
						<?php print $site['biography']; ?>
					</h3>

					<div class="padded"></div>

					<p class="text-justify helvultra">
						<?php print nl2br( $about['biography'] ); ?>
					</p>
				</div>
			</div>
	
			<div class="padded"></div>

			<div class="row" id="musicians">

				<div class="col-md-4 col-lg-4">
					<h5 class="text-center helvultra">
						<a href="?_=gerard" class="no-style">
							<img src="global/img/members/gerard.jpg" width="120px" class="img-thumbnail">
						</a>
							<br>
							<br>
						<a href="?_=gerard">
							<?php print $gerard['name']; ?>
						</a>
					</h5>
					<?php /*
					<p class="text-left helvultra">
						<?php print nl2br( $gerard['cv'] ); ?>
					</p>
					<p>
					</p>
					*/ ?>
				</div>
				
				<div class="col-md-4 col-lg-4">
					<h5 class="text-center helvultra">
						<a href="?_=irene" class="no-style">
							<img src="global/img/members/irene.jpg" width="120px" class="img-thumbnail">
						</a>
							<br>
							<br>
						<a href="?_=irene">
							<?php print $irene['name']; ?>
						</a>
					</h5>
					<?php /*
					<p class="text-left helvultra">
						<?php print nl2br( $irene['cv'] ); ?>
					</p>
					<p>
						<a href="http://irene-enzlin.com/">Website</a>
					</p>
					*/ ?>
				</div>

				<div class="col-md-4 col-lg-4">
					<h5 class="text-center helvultra">
						<a href="?_=vera" class="no-style">
							<img src="global/img/members/vera.jpg" width="120px" class="img-thumbnail">
						</a>
							<br>
							<br>
						<a href="?_=vera">
							<?php print $vera['name']; ?>
						</a>
					</h5>
					<?php /*
					<p class="text-left helvultra">
						<?php print nl2br( $vera['cv'] ); ?>
					</p>
					<p>
						<a href="http://verakooper.com/">Website</a>
					</p>
					*/ ?>
				</div>
			</div>
		</section>

		<?php require_once "sections/flags.php"; ?>

		<?php require_once "sections/menu.php"; ?>

		<?php include_once "global/ressources/js.php"; ?>
	</body>
</html>