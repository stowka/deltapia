<?php
	header( "Content-Type: application/json" );
	$db = SPDO::getInstance();
	$limit = 4;
	$stmt = $db->prepare( "select date_format(datetime, '%M') as month, count(ip) as visits from visit group by month order by datetime asc limit 0, :limit;" );
	$stmt->bindParam( ":limit", $limit, PDO::PARAM_INT );
	$stmt->execute();
	$visits = $stmt->fetchAll( PDO::FETCH_ASSOC );
	$stmt->closeCursor();
	print json_encode( $visits );