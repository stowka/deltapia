<?php
	$countries = array();
	foreach ( Country::all() as $country ):
		if ( $country->getName() ):
			$countries[] = array(
				"id" => $country->getId(),
				"name" => $country->getName(),
			);
		endif;
	endforeach;
	$json = array(
		"error" => false,
		"countries" => $countries
	);
	print json_encode( $json );