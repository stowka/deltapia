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
						<?php print $menu['concerts']; ?>
					</h3>

					<div class="padded"></div>

					<?php
						if ( count( $monthsUpcoming ) ):
					?>
							<h4 class="text-center">
								<?php print $site['upcoming']; ?>
							</h4>
							<?php
								foreach ( $monthsUpcoming as $month ):
									$concerts = Concert::upcomingConcertsByMonth( $month, LANG );
							?>
									<h5 class="helvultra">
										<?php print ucwords( utf8_encode( $month ) ); ?>
									</h5>
									<div class="panel-group" id="accordionUpcoming">
							<?php
									foreach ( $concerts as $concert ):
							?>
										<div class="block-post">
											<h6 class="text-left">
												<a data-toggle="collapse" class="concert" data-parent="#accordionUpcoming" href="#concert_<?php print $concert->getId(); ?>">
													<div class="row">
														<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
															<span class="block-date"><?php print strftime( "%e", $concert->getDatetime() );?></span>
															<span class="block-day"><?php print strtoupper( strftime( "%a", $concert->getDatetime() ) );?></span>
														</div>

														<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
															<span class="block-title"><?php print $concert->getTitle(); ?><br>
																<span class="text-small">
																	<span class="glyphicon glyphicon-time"></span> 
																	<?php print strftime( "%Hh%M", $concert->getDatetime() ); ?><br>
																	<span class="glyphicon glyphicon-globe"></span> 
																	<?php print $concert->getVenue(); ?>, <?php print $concert->getVenue()->getCity(); ?> 
																	(<?php print $concert->getVenue()->getCity()->getCountry(); ?>)
																</span>
															</span>
														</div>
													</div>
												</a>
											</h6>

											<h5 id="concert_<?php print $concert->getId(); ?>" class="panel-collapse collapse">
												<div class="row">
													<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>

													<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
														<p class="helvultra concert-description">
															<?php print nl2br( $concert->getVenue()->getAddress() ); ?>
														</p>
														<p class="helvultra concert-description">
															<?php print nl2br( $concert->getDescription() ); ?>	
														</p>
													</div>
												</div>
											</h5>
										</div>
										<hr class="visible-sm visible-xs">
							<?php
									endforeach;
							?>
									</div>
							<?php
								endforeach;
							?>

							<hr class="between-concert">

					<?php
						endif;
					?>

					<h4 class="text-center">
						<?php print $site['past']; ?>
					</h4>
					<?php
						foreach ( $monthsPast as $month ):
							$concerts = Concert::pastConcertsByMonth( $month, LANG );
					?>
							<h5 class="helvultra">
								<?php print ucwords( utf8_encode( $month ) ); ?>
							</h5>
							<div class="panel-group" id="accordionUpcoming">
					<?php
							foreach ( $concerts as $concert ):
					?>
								<div class="block-post">
									<h6 class="text-left">
										<a data-toggle="collapse" class="concert" data-parent="#accordionUpcoming" href="#concert_<?php print $concert->getId(); ?>">
											<div class="row">
												<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
													<span class="block-date"><?php print strftime( "%e", $concert->getDatetime() );?></span>
													<span class="block-day"><?php print strtoupper( strftime( "%a", $concert->getDatetime() ) );?></span>
												</div>

												<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
													<span class="block-title"><?php print $concert->getTitle(); ?><br>
														<span class="text-small">
															<span class="glyphicon glyphicon-time"></span> 
															<?php print strftime( "%Hh%M", $concert->getDatetime() ); ?><br>
															<span class="glyphicon glyphicon-globe"></span> 
															<?php print $concert->getVenue(); ?>, <?php print $concert->getVenue()->getCity(); ?> 
															(<?php print $concert->getVenue()->getCity()->getCountry(); ?>)
														</span>
													</span>
												</div>
											</div>
										</a>
									</h6>

									<h5 id="concert_<?php print $concert->getId(); ?>" class="panel-collapse collapse">
										<div class="row">
											<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>

											<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
												<p class="helvultra concert-description">
													<?php print nl2br( $concert->getVenue()->getAddress() ); ?>
												</p>
												<p class="helvultra concert-description">
													<?php print nl2br( $concert->getDescription() ); ?>	
												</p>
											</div>
										</div>
									</h5>
								</div>
								<hr class="visible-sm visible-xs">
					<?php
							endforeach;
					?>
							</div>
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