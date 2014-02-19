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
						<?php print $menu['photos']; ?>
					</h3>
				
					<div class="padded"></div>

					<?php
						foreach ( $albums as $album ):
					?>
							<h4 class="text-center helvultra">
								<?php print $album; ?>
							</h4>
							<p class="text-center lead helvultra">
								<div class="photoshot">
									<?php
											foreach ( Picture::from( $album->getId() ) as $p ):
									?>
													<a class="no-style thumbnail" href="global/img/albums/<?php print $album->getId(); ?>/<?php print $p; ?>" data-lightbox="<?php print $album->getId(); ?>" title="<?php print $album->getTitle(); ?>">
														<img src="global/img/albums/<?php print $album->getId(); ?>/<?php print $p; ?>" class="img-thumbnail" width="300px">
													</a>
									<?php
											endforeach;
									?>
								</div>
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