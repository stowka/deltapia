<?php
	header( "Content-Type: application/json" );
	include_once "config/config.inc";

	$ajaxAllowed = array(
		"countries",
		"cities",
		"venues",
		"add_country",
		"add_city",
		"add_venue",
		"countryPie",
		"visits"
	);


	if ( isset( $_GET['page'] ) && in_array( $_GET['page'], $ajaxAllowed ) ):
		include_once "ajax/" . $_GET['page'] . ".php";
	endif;