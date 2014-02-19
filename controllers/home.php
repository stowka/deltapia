<?php
	$stmt = $dbh->prepare( "select h.* from home h inner join language l on h.language = l.id where l.code = ucase(:language);" );
	$stmt->bindValue( "language", LANG, PDO::PARAM_STR );
	$stmt->execute();
	$home = $stmt->fetch( PDO::FETCH_ASSOC );
	$stmt->closeCursor();

	$logoSize = "logo-md";
	$alignment = "center";

	include_once "views/home.php";