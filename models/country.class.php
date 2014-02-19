<?php
	class Country {
		private $id, $name, $shortName, $latitude, $longitude;

		function __construct( $id, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select cn.name as name, c.shortName, c.latitude, c.longitude
									from country c inner join countryName cn on c.id = cn.country 
									inner join language l on cn.language = l.id
									where c.id = :id and l.code = ucase(:language);" );
			$stmt->bindParam( ":id", $id, PDO::PARAM_INT );
			$stmt->bindParam( ":language", $language, PDO::PARAM_STR );
			$stmt->execute();
			$country = $stmt->fetch( PDO::FETCH_ASSOC );
			$stmt->closeCursor();
			$this->id = $id;
			$this->name = $country['name'];
			$this->shortName = $country['shortName'];
			$this->latitude = $country['latitude'];
			$this->longitude = $country['longitude'];
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

		function getShortName() {
			return $this->shortName;
		}

		function getLatitude() {
			return $this->latitude;
		}

		function getlongitude() {
			return $this->Longitude;
		}

		static function all( $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from country order by shortName asc;" );
			$stmt->execute();
			$countries = array();
			while ( $country = $stmt->fetch( PDO::FETCH_NUM ) )
				$countries[] = new Country( $country[0], $language );
			$stmt->closeCursor();
			return $countries;
		}

		static function create( $name, $countryNames ) {
			$name = ucwords( $name );
			$nameUrl = urlencode( $name );
			$json = file_get_contents( "http://maps.googleapis.com/maps/api/geocode/json?address=$nameUrl&sensor=true" );
			$data = json_decode( $json );
			
			$latitude = $data->results[0]->geometry->location->lat;
			$longitude = $data->results[0]->geometry->location->lng;

			$shortName = strtoupper( $data->results[0]->address_components[0]->short_name );

			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "insert into country (name, shortName, latitude, longitude)
									values (:name, :shortName, :latitude, :longitude);" );
			$stmt->bindParam( ":name", $name, PDO::PARAM_STR );
			$stmt->bindParam( ":shortName", $shortName, PDO::PARAM_STR );
			$stmt->bindParam( ":latitude", $latitude, PDO::PARAM_STR );
			$stmt->bindParam( ":longitude", $longitude, PDO::PARAM_STR );
			$stmt->execute();
			$stmt->closeCursor();
			$country = $dbh->lastInsertId();

			foreach ( $countryNames as $language => $countryName ):
				$stmt = $dbh->prepare( "insert into countryName (country, language, name)
									values (:country, :language, :name);" );
				$stmt->bindParam( ":country", $country, PDO::PARAM_INT );
				$stmt->bindParam( ":language", $language, PDO::PARAM_INT );
				$stmt->bindParam( ":name", $countryName, PDO::PARAM_STR );
				$stmt->execute();
				$stmt->closeCursor();
			endforeach;
		}
	}