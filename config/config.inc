<?php
	session_save_path("/tmp/deltapia");
	session_start();

	# Database
	include_once "lib/spdo.class.php";
	$dbh = SPDO::getInstance();

	# Class autoload
	function __autoload( $class_name ) {
		if ( file_exists('models/' . strtolower( $class_name ) . '.class.php' ) ) 
			require_once 'models/' . strtolower( $class_name ) . '.class.php';
		else
			throw new Exception( "Unable to load $class_name." );
	}

	# Country
	$ip = $_SERVER['REMOTE_ADDR'];
	$country = file_get_contents( "http://api.hostip.info/country.php?ip=$ip" );
	if ( $country === "XX" || $country === "EU" ) {
		$data = unserialize( file_get_contents( 'http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR'] ) );
		$country = !empty( $data['geoplugin_countryCode'] ) ? $data['geoplugin_countryCode'] : $country;
	}
	$stmt = $dbh->prepare( "select ip from visit where ip = :ip;" );
	$stmt->bindParam( ":ip", $ip, PDO::PARAM_STR );
	$stmt->execute();
	$ipExists = $stmt->fetch() ? true : false;
	$stmt->closeCursor();
	if ( !$ipExists ):
		$stmt = $dbh->prepare( "insert into visit (ip, country) values (:ip, :country);" );
		$stmt->bindParam( ":ip", $ip, PDO::PARAM_STR );
		$stmt->bindParam( ":country", $country, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
	endif;

	# Language
	$stmt = $dbh->prepare( "select ucase(code) from language;" );
	$stmt->execute();
	$authorized_languages = array();
	while ( $language = $stmt->fetch( PDO::FETCH_NUM ) ):
		$authorized_languages[] = $language[0];
	endwhile;

	if ( isset( $_GET['lang'] )
	&& in_array( $_GET['lang'], $authorized_languages ) ):
		
		$_SESSION['lang'] = $_GET['lang'];
	
	elseif ( !isset( $_SESSION['lang'] ) ):
		$german = array( "DE", "AT", "CH" );
		$dutch = array( "NL", "BE" );

		if ( in_array( $country, $german ) )
			$_SESSION['lang'] = "DE";
		elseif ( in_array( $country, $dutch ) )
			$_SESSION['lang'] = "NL";
		else
			$_SESSION['lang'] = "EN";
	
	endif;

	define( "LANG", $_SESSION['lang'] );
	define( "COUNTRY", $country );

	switch ( LANG ):
		case 'EN':
			if ( $country === "US" )
				setlocale( LC_TIME, 'en_US.UTF-8' );
			elseif ( $country === "CA" )
				setlocale( LC_TIME, 'en_CA.UTF-8' );
			else
				setlocale( LC_TIME, 'en_GB.UTF-8' );
			break;
		case 'NL':
			if ( $country === "BE" )
				setlocale( LC_TIME, 'nl_BE.UTF-8' );
			else
				setlocale( LC_TIME, 'nl_NL.UTF-8' );
			break;
		case 'DE':
			if ( $country === "AT" )
				setlocale( LC_TIME, 'de_AT.UTF-8' );
			elseif ( $country === "CH" )
				setlocale( LC_TIME, 'de_CH.UTF-8' );
			else
				setlocale( LC_TIME, 'de_DE.UTF-8' );
			break;
	endswitch;

	# Contact
	$contact_email = "antoine.degieter@me.com";

	# Pages
	$authorized_pages = array(
		"home",
		"about",
		"gerard",
		"irene",
		"vera",
		"concerts",
		"photos",
		"recordings",
		"contact",
		"repertoire",
		"admin"
	);