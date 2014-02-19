<?php
	if ( isset( $_GET['city'] ) && !empty( $_GET['city'] ) ):
		$city = $_GET['city'];
		$venues = array();
		foreach ( Venue::in( $city ) as $city ):
			if ( $city->getName() ):
				$venues[] = array(
					"id" => $city->getId(),
					"name" => $city->getName(),
				);
			endif;
		endforeach;
		$json = array(
			"error" => false,
			"venues" => $venues
		);
		print json_encode( $json );
	else:
		print json_encode( array(
			"error" => true
		) );
	endif;