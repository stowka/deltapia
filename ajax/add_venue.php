<?php
	if( isset( $_POST['city'] ) && !empty( $_POST['city'] )
	&&  isset( $_POST['name'] ) && !empty( $_POST['name'] )
	&&  isset( $_POST['address'] ) ):
		$city = $_POST['city'];
		$name = $_POST['name'];
		if ( !empty( $_POST['address'] ) ):
			$address = $_POST['address'];
		else:
			$address = false;
		endif;

		Venue::create( $name, $city, $address );
		print json_encode( array( 
			"error" => false
		) );
	else:
		print json_encode( array(
			"error" => true
		) );
	endif;