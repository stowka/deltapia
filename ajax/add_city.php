<?php
	if( isset( $_POST['country'] ) && !empty( $_POST['country'] )
	&&  isset( $_POST['en'] ) && !empty( $_POST['en'] )
	&&  isset( $_POST['nl'] ) && !empty( $_POST['nl'] )
	&&  isset( $_POST['de'] ) && !empty( $_POST['de'] ) ):
		$country = $_POST['country'];
		$name = $en = $_POST['en'];
		$nl = $_POST['nl'];
		$de = $_POST['de'];

		$names = array(
			1 => $en, 
			2 => $nl,
			3 => $de
		);

		City::create( $name, $country, $names );
		print json_encode( array( 
			"error" => false
		) );
	else:
		print json_encode( array(
			"error" => true
		) );
	endif;