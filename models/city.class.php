<?php
	class City {
		private $id, $name, $country, $latitude, $longitude;

		function __construct( $id, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select cn.name as name, c.country as country, c.latitude, c.longitude
									from city c inner join cityName cn on c.id = cn.city 
									inner join language l on cn.language = l.id
									where c.id = :id and l.code = ucase(:language);" );
			$stmt->bindParam( ":id", $id, PDO::PARAM_INT );
			$stmt->bindParam( ":language", $language, PDO::PARAM_STR );
			$stmt->execute();
			$city = $stmt->fetch( PDO::FETCH_ASSOC );
			$stmt->closeCursor();
			$this->id = $id;
			$this->name = $city['name'];
			$this->country = new Country( $city['country'], $language );
			$this->latitude = $city['latitude'];
			$this->longitude = $city['longitude'];
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

		function getCountry() {
			return $this->country;
		}

		function getLatitude() {
			return $this->latitude;
		}

		function getlongitude() {
			return $this->Longitude;
		}

		static function all( $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from city order by name;" );
			$stmt->execute();
			$cities = array();
			while ( $city = $stmt->fetch( PDO::FETCH_NUM ) )
				$cities[] = new City( $city[0], $language );
			$stmt->closeCursor();
			return $cities;
		}

		static function in( $country,  $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from city where country = :country order by name;" );
			$stmt->bindParam( ":country", $country, PDO::PARAM_INT );
			$stmt->execute();
			$cities = array();
			while ( $city = $stmt->fetch( PDO::FETCH_NUM ) )
				$cities[] = new City( $city[0], $language );
			$stmt->closeCursor();
			return $cities;
		}

		static function create( $name, $country, $cityNames ) {
			$name = ucwords( $name );
			$nameUrl = urlencode( $name );
			$json = file_get_contents( "http://maps.googleapis.com/maps/api/geocode/json?address=$nameUrl&sensor=true" );
			$data = json_decode( $json );
			
			$latitude = $data->results[0]->geometry->location->lat;
			$longitude = $data->results[0]->geometry->location->lng;

			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "insert into city (name, country, latitude, longitude)
									values (:name, :country, :latitude, :longitude);" );
			$stmt->bindParam( ":name", $name, PDO::PARAM_STR );
			$stmt->bindParam( ":country", $country, PDO::PARAM_INT );
			$stmt->bindParam( ":latitude", $latitude, PDO::PARAM_STR );
			$stmt->bindParam( ":longitude", $longitude, PDO::PARAM_STR );
			$stmt->execute();
			$stmt->closeCursor();
			$city = $dbh->lastInsertId();

			foreach ( $cityNames as $language => $cityName ):
				$stmt = $dbh->prepare( "insert into cityName (city, language, name)
									values (:city, :language, :name);" );
				$stmt->bindParam( ":city", $city, PDO::PARAM_INT );
				$stmt->bindParam( ":language", $language, PDO::PARAM_INT );
				$stmt->bindParam( ":name", $cityName, PDO::PARAM_STR );
				$stmt->execute();
				$stmt->closeCursor();
			endforeach;
		}
	}