<?php
	$stmt = $dbh->prepare( "select r.* from repertoire r inner join language l on r.language = l.id where l.code = ucase(:language);" );
	$stmt->bindValue( ":language", LANG, PDO::PARAM_STR );
	$stmt->execute();
	$repertoire = $stmt->fetch( PDO::FETCH_ASSOC );
	$stmt->closeCursor();

	include_once "views/repertoire.php";