<?php
	$stmt = $dbh->prepare( "select a.* from about a inner join language l on a.language = l.id where l.code = ucase(:language);" );
	$stmt->bindValue( ":language", LANG, PDO::PARAM_STR );
	$stmt->execute();
	$about = $stmt->fetch( PDO::FETCH_ASSOC );
	$stmt->closeCursor();

	$stmt = $dbh->prepare( "select m.id, m.firstName, m.lastName, 
							concat(m.firstName, ' ', m.lastName) as name, 
							i.name as instrument, m.dateOfBirth, c.text as cv
							from member m inner join instrument i on m.instrument = i.id 
							inner join cv c on c.member = m.id 
							inner join language l on c.language = l.id
							where l.code = ucase(:language)
							order by m.id;" );
	$stmt->bindValue( ":language", LANG, PDO::PARAM_STR );
	$stmt->execute();
	$gerard = $stmt->fetch( PDO::FETCH_ASSOC );
	$irene = $stmt->fetch( PDO::FETCH_ASSOC );
	$vera = $stmt->fetch( PDO::FETCH_ASSOC );
	$stmt->closeCursor();

	include_once "views/vera.php";