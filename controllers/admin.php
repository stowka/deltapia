<?php
	# Password
	if ( isset( $_POST['super'] ) 
	&& sha1( $_POST['super'] ) === "20eaf33a830460c329d313652638524723db152f" ):
		$_SESSION['super'] = true;
	endif;

	$saved = false;
	
	# Post about
	if ( isset( $_POST['about-en'] ) && isset( $_POST['about-nl'] ) && isset( $_POST['about-de'] ) ):
		$en = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['about-en'] ) ) );
		$nl = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['about-nl'] ) ) );
		$de = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['about-de'] ) ) );

		$stmt = $dbh->prepare( "update about set biography = :en where language = 1;" );
		$stmt->bindParam( ":en", $en, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update about set biography = :nl where language = 2;" );
		$stmt->bindParam( ":nl", $nl, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update about set biography = :de where language = 3;" );
		$stmt->bindParam( ":de", $de, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		$saved = true;
	endif;

	# Post Gerard's CV
	if ( isset( $_POST['gerard-en'] ) && isset( $_POST['gerard-nl'] ) && isset( $_POST['gerard-de'] ) ):
		$en = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['gerard-en'] ) ) );
		$nl = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['gerard-nl'] ) ) );
		$de = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['gerard-de'] ) ) );

		$stmt = $dbh->prepare( "update cv set text = :en where member = 1 and language = 1;" );
		$stmt->bindParam( ":en", $en, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update cv set text = :nl where member = 1 and language = 2;" );
		$stmt->bindParam( ":nl", $nl, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update cv set text = :text where member = 1 and language = 3;" );
		$stmt->bindParam( ":text", $de, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		$saved = true;
	endif;

	# Post Irene's CV
	if ( isset( $_POST['irene-en'] ) && isset( $_POST['irene-nl'] ) && isset( $_POST['irene-de'] ) ):
		$en = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['irene-en'] ) ) );
		$nl = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['irene-nl'] ) ) );
		$de = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['irene-de'] ) ) );

		$stmt = $dbh->prepare( "update cv set text = :en where member = 2 and language = 1;" );
		$stmt->bindParam( ":en", $en, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update cv set text = :nl where member = 2 and language = 2;" );
		$stmt->bindParam( ":nl", $nl, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update cv set text = :de where member = 2 and language = 3;" );
		$stmt->bindParam( ":de", $de, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		$saved = true;
	endif;

	# Post Vera's CV
	if ( isset( $_POST['vera-en'] ) && isset( $_POST['vera-nl'] ) && isset( $_POST['vera-de'] ) ):
		$en = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['vera-en'] ) ) );
		$nl = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['vera-nl'] ) ) );
		$de = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['vera-de'] ) ) );

		$stmt = $dbh->prepare( "update cv set text = :en where member = 3 and language = 1;" );
		$stmt->bindParam( ":en", $en, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update cv set text = :nl where member = 3 and language = 2;" );
		$stmt->bindParam( ":nl", $nl, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update cv set text = :de where member = 3 and language = 3;" );
		$stmt->bindParam( ":de", $de, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		$saved = true;
	endif;

	# About
	$stmt = $dbh->prepare( "select a.*, l.code as language from about a inner join language l on a.language = l.id;" );
	$stmt->execute();
	$aboutEN = $stmt->fetch( PDO::FETCH_ASSOC );
	$aboutNL = $stmt->fetch( PDO::FETCH_ASSOC );
	$aboutDE = $stmt->fetch( PDO::FETCH_ASSOC );
	$stmt->closeCursor();

	# Post repertoire
	if ( isset( $_POST['repertoire-en'] ) && isset( $_POST['repertoire-nl'] ) && isset( $_POST['repertoire-de'] )
	&& isset( $_POST['introduction-en'] ) && isset( $_POST['introduction-nl'] ) && isset( $_POST['introduction-de'] ) ):
		$intro_en = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['introduction-en'] ) ) );
		$intro_nl = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['introduction-nl'] ) ) );
		$intro_de = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['introduction-de'] ) ) );

		$en = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['repertoire-en'] ) ) );
		$nl = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['repertoire-nl'] ) ) );
		$de = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['repertoire-de'] ) ) );

		$stmt = $dbh->prepare( "update repertoire set repertoire = :en, introduction = :intro_en where language = 1;" );
		$stmt->bindParam( ":en", $en, PDO::PARAM_STR );
		$stmt->bindParam( ":intro_en", $intro_en, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update repertoire set repertoire = :nl, introduction = :intro_nl where language = 2;" );
		$stmt->bindParam( ":nl", $nl, PDO::PARAM_STR );
		$stmt->bindParam( ":intro_nl", $intro_nl, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		
		$stmt = $dbh->prepare( "update repertoire set repertoire = :de, introduction = :intro_de where language = 3;" );
		$stmt->bindParam( ":de", $de, PDO::PARAM_STR );
		$stmt->bindParam( ":intro_de", $intro_de, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		$saved = true;
	endif;

	# CVs
	$stmt = $dbh->prepare( "select m.id, m.firstName, m.lastName, 
							concat(m.firstName, ' ', m.lastName) as name, 
							i.name as instrument, m.dateOfBirth, c.text as cv,
							l.code as language
							from member m inner join instrument i on m.instrument = i.id 
							inner join cv c on c.member = m.id 
							inner join language l on c.language = l.id
							order by m.id;" );
	$stmt->bindValue( ":language", LANG, PDO::PARAM_STR );
	$stmt->execute();
	$gerardEN = $stmt->fetch( PDO::FETCH_ASSOC );
	$gerardNL = $stmt->fetch( PDO::FETCH_ASSOC );
	$gerardDE = $stmt->fetch( PDO::FETCH_ASSOC );
	$ireneEN = $stmt->fetch( PDO::FETCH_ASSOC );
	$ireneNL = $stmt->fetch( PDO::FETCH_ASSOC );
	$ireneDE = $stmt->fetch( PDO::FETCH_ASSOC );
	$veraEN = $stmt->fetch( PDO::FETCH_ASSOC );
	$veraNL = $stmt->fetch( PDO::FETCH_ASSOC );
	$veraDE = $stmt->fetch( PDO::FETCH_ASSOC );
	$stmt->closeCursor();

	# Repertoire
	$stmt = $dbh->prepare( "select r.*, l.code as language from repertoire r inner join language l on r.language = l.id;" );
	$stmt->bindValue( ":language", LANG, PDO::PARAM_STR );
	$stmt->execute();
	$repertoireEN = $stmt->fetch( PDO::FETCH_ASSOC );
	$repertoireNL = $stmt->fetch( PDO::FETCH_ASSOC );
	$repertoireDE = $stmt->fetch( PDO::FETCH_ASSOC );
	$stmt->closeCursor();

	# Post concert
	$concert_added = false;
	$concert_deleted = false;
	if ( isset( $_POST['add_concert'] ) ):
		$title = $_POST['title'];
		$date = $_POST['date'];
		$hour = $_POST['hour'] < 10 ? "0" . $_POST['hour'] : $_POST['hour'];
		$minute = $_POST['minute'] < 10 ? "0" . $_POST['minute'] : $_POST['minute'];
		$venue = $_POST['venue'];

		$datetime = $date . " " . $hour . ":" . $minute . ":00";

		$en = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['concert-en'] ) ) );
		$nl = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['concert-nl'] ) ) );
		$de = preg_replace( "#<br />#", "\r\n", preg_replace( "#</?p>#", "", preg_replace( "#</p>(\r?\n)?<p>#", "\r\n\r\n", $_POST['concert-de'] ) ) );

		$stmt = $dbh->prepare( "insert into concert (title, datetime, venue) 
								values (:title, :datetime, :venue)" );
		$stmt->bindParam( ":title", $title, PDO::PARAM_STR );
		$stmt->bindParam( ":datetime", $datetime, PDO::PARAM_STR );
		$stmt->bindParam( ":venue", $venue, PDO::PARAM_INT );
		$stmt->execute();
		$stmt->closeCursor();
		$concert = $dbh->lastInsertId();

		$stmt = $dbh->prepare( "insert into concertDescription (concert, language, text) 
								values (:concert, 1, :en), 
								(:concert, 2, :nl), 
								(:concert, 3, :de);" );
		$stmt->bindParam( ":concert", $concert, PDO::PARAM_INT );
		$stmt->bindParam( ":en", $en, PDO::PARAM_STR );
		$stmt->bindParam( ":nl", $nl, PDO::PARAM_STR );
		$stmt->bindParam( ":de", $de, PDO::PARAM_STR );
		$stmt->execute();
		$stmt->closeCursor();
		$concert_added = true;
	endif;

	# Delete concert
	if ( isset( $_POST['delete'] ) ):
		$stmt = $dbh->prepare( "delete from concert where id = :id;" );
		$stmt->bindParam( ":id", $_POST['id'], PDO::PARAM_INT );
		$stmt->execute();
		$stmt->closeCursor();
		$concert_deleted = true;
	endif;

	# Concerts
	$concerts = Concert::all();


	$allowedAdminPages = array(
		"about",
		"gerard",
		"irene",
		"vera",
		"add_concert",
		"concerts",
		"repertoire",
		"photos",
		"stats",
		"password"
	);

	if ( isset( $_SESSION['super'] ) 
	|| ( isset( $_POST['super'] ) && sha1( $_POST['super'] ) === "20eaf33a830460c329d313652638524723db152f" ) ):
		if ( !isset( $_GET['page'] ) )
			$page = "concerts";
		elseif ( in_array( $_GET['page'] , $allowedAdminPages ) )
			$page = $_GET['page'];
		else
			$page = "about";
	else:
		$page = "password";
	endif;

	include_once "views/admin.php";