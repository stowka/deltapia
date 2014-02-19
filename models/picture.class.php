<?php
	class Picture {
		private $id, $extension;

		function __construct( $id ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select e.extension from picture p
									inner join extension e on p.extension = e.id
									where p.id = :id;" );
			$stmt->bindParam( ":id", $id, PDO::PARAM_INT );
			$stmt->execute();
			$picture = $stmt->fetch( PDO::FETCH_ASSOC );
			$stmt->closeCursor();
			$this->id = $id;
			$this->extension = $picture['extension'];
		}

		function __toString() {
			return $this->id . "." . $this->extension;
		}

		function getId() {
			return $this->id;
		}

		function getExtension() {
			return $this->extension;
		}

		static function from( $album, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from picture where album = :album order by id;" );
			$stmt->bindParam( ":album", $album, PDO::PARAM_INT );
			$stmt->execute();
			$pictures = array();
			while ( $picture = $stmt->fetch( PDO::FETCH_NUM ) )
				$pictures[] = new Picture( $picture[0], $language );
			$stmt->closeCursor();
			return $pictures;
		}

		static function create( $extension, $album ) {			
			$dbh = SPDO::getInstance();

			$stmt = $dbh->prepare( "select id from extension where extension = lcase(:extension);" );
			$stmt->bindParam( ":extension", $extension, PDO::PARAM_STR );
			$stmt->execute();
			$extension = $stmt->fetch( PDO::FECTH_NUM );
			$stmt->closeCursor();
			$extension = $extension[0];

			$stmt = $dbh->prepare( "insert into picture (extension, album)
									values (:extension, :album);" );
			$stmt->bindParam( ":extension", $extension, PDO::PARAM_INT );
			$stmt->bindParam( ":album", $album, PDO::PARAM_INT );
			$stmt->execute();
			$stmt->closeCursor();
		}
	}