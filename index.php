<?php
	ob_start();
	include_once "config/config.inc";

	if ( !isset( $_GET['_'] ) ):
		$page = "home";
	else:
		$page = $_GET['_'];
	endif;

	if ( in_array( $page, $authorized_pages ) ):
		foreach ( $authorized_pages as $authorized_page ):
			switch ( $page ):
				case $authorized_page:
					# Site
					$stmt = $dbh->prepare( "select s.* from site s inner join language l on s.language = l.id where l.code = ucase(:language);" );
					$stmt->bindValue( "language", LANG, PDO::PARAM_STR );
					$stmt->execute();
					$site = $stmt->fetch( PDO::FETCH_ASSOC );
					$stmt->closeCursor();

					# Menu
					$stmt = $dbh->prepare( "select m.* from menu m inner join language l on m.language = l.id where l.code = ucase(:language);" );
					$stmt->bindValue( "language", LANG, PDO::PARAM_STR );
					$stmt->execute();
					$menu = $stmt->fetch( PDO::FETCH_ASSOC );
					$stmt->closeCursor();

					define( "PAGE_TITLE", $site['name'] );

					include_once "controllers/$page.php";
					break;
			endswitch;
		endforeach;
	else:
		define ( "PAGE_TITLE", "Delta Piano Trio • Page not found" );
		header('HTTP/1.0 404 Not Found');
		include_once "controllers/404.php";
	endif;