<?php
	$json = json_decode( 
		file_get_contents( 
			"https://gdata.youtube.com/feeds/api/videos?author=UCgkI-FhLVOhU3aG2g-1Ij3w&v=2&alt=jsonc&orderby=published" 
		) 
	);

	$videos = array();
	foreach ( $json->data->items as $item ):
		$videos[] = $item->id;
	endforeach;

	include_once "views/recordings.php";