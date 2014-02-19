<?php
	if ( isset( $_GET['country'] ) && !empty( $_GET['country'] ) ):
		$country = $_GET['country'];
		$cities = array();
		foreach ( City::in( $country ) as $city ):
			if ( $city->getName() ):
				$cities[] = array(
					"id" => $city->getId(),
					"name" => $city->getName(),
				);
			endif;
		endforeach;
		$json = array(
			"error" => false,
			"cities" => $cities
		);
		print json_encode( $json );
	else:
		print json_encode( array(
			"error" => true
		) );
	endif;