<?php
	class Photographer {
		private $id, $name, $website;

		function __construct( $id ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select name, website from photographer where id = :id;" );
			$stmt->bindParam( ":id", $id, PDO::PARAM_INT );
			$stmt->execute();
			$photographer = $stmt->fetch( PDO::FETCH_ASSOC );
			$stmt->closeCursor();
			$this->id = $id;
			$this->name = $photographer['name'];
			$this->website = $photographer['website'];
		}

		function __toString() {
			return "" . $this->name;
		}

		function getId() {
			return $this->id;
		}

		function getName() {
			return $this->name;
		}

		function getWebsite() {
			return $this->website;
		}

		static function all() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from photographer order by name;" );
			$stmt->execute();
			$photographers = array();
			while ( $photographer = $stmt->fetch( PDO::FETCH_NUM ) )
				$photographers[] = new Photographer( $photographer[0] );
			$stmt->closeCursor();
			return $photographers;
		}

		static function create( $name, $website ) {
			$name = ucwords( $name );
			
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "insert into photographer (name, website)
									values (:name, :website);" );
			$stmt->bindParam( ":name", $name, PDO::PARAM_STR );
			$stmt->bindParam( ":website", $website, PDO::PARAM_STR );
			$stmt->execute();
			$stmt->closeCursor();
		}
	}