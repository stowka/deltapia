<?php
	header( "Content-Type: application/json" );
	$db = SPDO::getInstance();
	$stmt = $db->prepare( "select country, count(*) as total , round((count(*) / (select count(*) from visit) * 100), 2) as percentage from visit group by country;" );
	$stmt->execute();
	$os = $stmt->fetchAll( PDO::FETCH_ASSOC );
	$stmt->closeCursor();
	print json_encode( $os );