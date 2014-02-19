<?php
	class Venue {
		private $id, $name, $address, $city, $language;

		function __construct( $id, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select * from venue where id = :id;" );
			$stmt->bindParam( ":id", $id, PDO::PARAM_INT );
			$stmt->execute();
			$venue = $stmt->fetch( PDO::FETCH_ASSOC );
			$stmt->closeCursor();
			$this->id = $id;
			$this->name = $venue['name'];
			$this->address = $venue['address'];
			$this->city = new City( $venue['city'], $language );
		}

		function __toString() {
			return $this->name;
		}

		function getId() {
			return $this->id;
		}

		function getName() {
			return $this->name;
		}

		function getAddress() {
			return $this->address;
		}

		function getCity() {
			return $this->city;
		}

		static function all( $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from venue order by name;" );
			$stmt->execute();
			$venues = array();
			while ( $venue = $stmt->fetch( PDO::FETCH_NUM ) )
				$venues[] = new Venue( $venue[0], $language );
			$stmt->closeCursor();
			return $venues;
		}

		static function in( $city, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from venue where city = :city order by name;" );
			$stmt->bindParam( ":city", $city, PDO::PARAM_INT );
			$stmt->execute();
			$venues = array();
			while ( $venue = $stmt->fetch( PDO::FETCH_NUM ) )
				$venues[] = new Venue( $venue[0], $language );
			$stmt->closeCursor();
			return $venues;
		}

		static function create( $name, $city, $address = false ) {
			$name = ucwords( $name );
			$nameUrl = urlencode( $name );
			if ( !$address ):
				$json = file_get_contents( "http://maps.googleapis.com/maps/api/geocode/json?address=$nameUrl&sensor=true" );
				$data = json_decode( $json );
				if ( $data->status === "OK" )
					$address = $data->results[0]->formatted_address;
				else
					$address = "";
			endif;

			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "insert into venue (name, address, city)
									values (:name, :address, :city);" );
			$stmt->bindParam( ":name", $name, PDO::PARAM_STR );
			$stmt->bindParam( ":address", $address, PDO::PARAM_STR );
			$stmt->bindParam( ":city", $city, PDO::PARAM_INT );
			$stmt->execute();
			$stmt->closeCursor();
		}
	}