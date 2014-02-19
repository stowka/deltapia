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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3 class="text-center">
						<?php print $menu['contact']; ?>
					</h3>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-4 col-lg-4">
					<p class="text-center">
					</p>
					<p class="text-center">
						<div style="background-color:#fff;" class="text-center">
							<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FDeltaPianoTrio&amp;width&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" 
							scrolling="no" 
							frameborder="0" 
							style="border:none; overflow:hidden; height:258px; width=400px" 
							allowTransparency="false"></iframe>
						</div>
					</p>
				</div>

				<div class="col-md-4 col-lg-4">
					<p class="text-center">
					</p>
					<p class="text-center">
						<script src="https://apis.google.com/js/platform.js"></script>

						<div class="g-ytsubscribe" data-channelid="UCgkI-FhLVOhU3aG2g-1Ij3w" data-theme="dark" data-layout="full" data-count="default"></div>
					</p>
				</div>

				<div class="col-md-4 col-lg-4">
					<p class="text-center">
					</p>
					<?php
						if ( !$sent ):
					?>
							<h4 class="text-left">
								<form action="" method="post">
									<input type="text" name="name" placeholder="<?php print $site['yourName']; ?>" class="form-control" required><br>
									<input type="text" name="email" placeholder="<?php print $site['yourEmail']; ?>" class="form-control" required><br>
									<textarea class="form-control" name="text" placeholder="<?php print $site['yourMessage']; ?>" rows="6" required></textarea><br>
									<button type="submit" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-send"> <?php print $site['send']; ?></button>
								</form>
							</h4>
					<?php
						else:
					?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong><span class="glyphicon glyphicon-ok"></span></strong>
							</div>
					<?php
						endif;
					?>
				</div>

			</div>
		</section>

		<?php require_once "sections/flags.php"; ?>

		<?php require_once "sections/menu.php"; ?>
		
		<?php include_once "global/ressources/js.php"; ?>
	</body>
</html>