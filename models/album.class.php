<?php
	class Album {
		private $id, $datetime, $photographer;

		function __construct( $id, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select datetime, photographer 
									from album where id = :id;" );
			$stmt->bindParam( ":id", $id, PDO::PARAM_INT );
			$stmt->execute();
			$album = $stmt->fetch( PDO::FETCH_ASSOC );
			$stmt->closeCursor();
			$this->id = $id;
			$this->datetime = $album['datetime'];
			$this->photographer = new Photographer( $album['photographer'] );
		}

		function __toString() {
			return '&copy; <a href="' . $this->photographer->getWebsite() . '">' . $this->photographer . '</a>';
		}

		function getTitle() {
			return '&copy; ' . $this->photographer;
		}

		function getId() {
			return $this->id;
		}

		function getDatetime() {
			return $this->datetime;
		}

		function getPhotographer() {
			return $this->photographer;
		}

		static function all( $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from album order by datetime desc;" );
			$stmt->execute();
			$albums = array();
			while ( $album = $stmt->fetch( PDO::FETCH_NUM ) )
				$albums[] = new Album( $album[0], $language );
			$stmt->closeCursor();
			return $albums;
		}

		static function create( $photographer ) {			
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "insert into album (photographer)
									values (photographer);" );
			$stmt->bindParam( ":date", $date, PDO::PARAM_STR );
			$stmt->bindParam( ":photographer", $photographer, PDO::PARAM_INT );
			$stmt->execute();
			$stmt->closeCursor();
		}
	}