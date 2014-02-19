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
						<?php print $menu['recordings']; ?>
					</h3>

					<div class="padded"></div>

					<?php
						foreach( $videos as $video ):
							$xml = simplexml_load_string( file_get_contents( "http://gdata.youtube.com/feeds/api/videos?q=" . $video ) );
							$title = $xml->entry->title; 
							$date = $xml->entry->published;
					?>
							<h4 class="text-center helvultra">
								<?php print ucwords( $title ); ?>
							</h4>
							<?php /*
							<h5 class="text-center helvultra">
								<?php print ucwords( strftime( "%A %e %B %Y", strtotime( $date ) ) ); ?>
							</h5>
							*/ ?>

							<p class="text-center hidden-xs hidden-sm">
								<iframe width="470" height="295" src="http://youtube.com/embed/<?php print $video; ?>?theme=dark&rel=0&showinfo=0&showsearch=0&modestbranding=1&autohide=1" allowfullscreen="1" frameborder="0"></iframe>
							</p>
							<p class="text-center visible-xs visible-sm">
								<iframe width="335" height="198" src="http://youtube.com/embed/<?php print $video; ?>?theme=dark&rel=0&showinfo=0&showsearch=0&modestbranding=1&autohide=1" allowfullscreen="1" frameborder="0"></iframe>
							</p>
					<?php 
						endforeach; 
					?>
				</div>
			</div>
		</section>

		<?php require_once "sections/flags.php"; ?>

		<?php require_once "sections/menu.php"; ?>
		
		<?php include_once "global/ressources/js.php"; ?>
	</body>
</html>