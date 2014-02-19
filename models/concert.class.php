<?php
	class Concert {
		private $id, $title, $datetime, $venue, $description;

		function __construct( $id, $language = "en" ) {
			$dbh = SPDO::getInstance();

			$stmt = $dbh->prepare( "select c.*, cd.text as description from concert c 
									inner join concertDescription cd on c.id = cd.concert 
									inner join language l on l.id = cd.language 
									where c.id = :id
									and l.code = ucase(:language);" );
			$stmt->bindParam( ":id", $id, PDO::PARAM_INT );
			$stmt->bindParam( ":language", $language, PDO::PARAM_STR );
			$stmt->execute();

			$concert = $stmt->fetch( PDO::FETCH_ASSOC );
			$stmt->closeCursor();

			$this->id = $id;
			$this->title = $concert['title'];
			$this->datetime = strtotime( $concert['datetime'] );
			$this->venue = new Venue( $concert['venue'], $language );
			$this->description = $concert['description'];
		}

		function getId() {
			return $this->id;
		}

		function getTitle() {
			return $this->title;
		}

		function getDatetime() {
			return $this->datetime;
		}

		function getVenue() {
			return $this->venue;
		}

		function getDescription() {
			return $this->description;
		}

		public static function monthsUpcoming( $language = "EN" ) {
			$lc_time = "";
			switch ( $language ):
				case 'EN':
					if ( COUNTRY === "US" )
						$lc_time = "en_GB";
					elseif ( COUNTRY === "CA" )
						$lc_time = "en_GB";
					else
						$lc_time = "en_GB";
					break;
				case 'NL':
					if ( COUNTRY === "BE" )
						$lc_time = "nl_BE";
					else
						$lc_time = "nl_NL";
					break;
				case 'DE':
					if ( COUNTRY === "AT" )
						$lc_time = "de_AT";
					elseif ( COUNTRY === "CH" )
						$lc_time = "de_CH";
					else
						$lc_time = "de_DE";
					break;
			endswitch;
			$dbh = SPDO::getInstance();
			$months = array();
			$stmt = $dbh->prepare( "set lc_time_names = :lc_time;" );
			$stmt->bindParam( ":lc_time", $lc_time, PDO::PARAM_STR );
			$stmt->execute();
			$stmt->closeCursor();
			$stmt = $dbh->prepare( "select date_format(datetime, '%M %Y') as month from `concert` 
									where datetime > now() group by month order by datetime asc;" );
			$stmt->execute();
			while ( $month = $stmt->fetch( PDO::FETCH_NUM ) )
				$months[] = $month[0];
			$stmt->closeCursor();
			return $months;
		}

		public static function monthsPast( $language = "EN" ) {
			switch ( $language ):
				case 'EN':
					if ( COUNTRY === "US" )
						$lc_time = "en_GB";
					elseif ( COUNTRY === "CA" )
						$lc_time = "en_GB";
					else
						$lc_time = "en_GB";
					break;
				case 'NL':
					if ( COUNTRY === "BE" )
						$lc_time = "nl_BE";
					else
						$lc_time = "nl_NL";
					break;
				case 'DE':
					if ( COUNTRY === "AT" )
						$lc_time = "de_AT";
					elseif ( COUNTRY === "CH" )
						$lc_time = "de_CH";
					else
						$lc_time = "de_DE";
					break;
			endswitch;
			$dbh = SPDO::getInstance();
			$months = array();
			$stmt = $dbh->prepare( "set lc_time_names = :lc_time;" );
			$stmt->bindParam( ":lc_time", $lc_time, PDO::PARAM_STR );
			$stmt->execute();
			$stmt->closeCursor();
			$stmt = $dbh->prepare( "select date_format(datetime, '%M %Y') as month from `concert` 
									where datetime < now() group by month order by datetime desc;" );
			$stmt->execute();
			while ( $month = $stmt->fetch( PDO::FETCH_NUM ) )
				$months[] = $month[0];
			$stmt->closeCursor();
			return $months;
		}

		static function all( $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from concert order by datetime desc;" );
			$stmt->execute();
			$concerts = array();
			while ( $concert = $stmt->fetch( PDO::FETCH_NUM ) )
				$concerts[] = new Concert( $concert[0], $language );
			$stmt->closeCursor();
			return $concerts;
		}

		static function upcoming( $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from concert where datetime > now() order by datetime asc;" );
			$stmt->execute();
			$concerts = array();
			while ( $concert = $stmt->fetch( PDO::FETCH_NUM ) )
				$concerts[] = new Concert( $concert[0], $language );
			$stmt->closeCursor();
			return $concerts;
		}

		static function past( $language = "en" ) {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare( "select id from concert where datetime < now() order by datetime desc;" );
			$stmt->execute();
			$concerts = array();
			while ( $concert = $stmt->fetch( PDO::FETCH_NUM ) )
				$concerts[] = new Concert( $concert[0], $language );
			$stmt->closeCursor();
			return $concerts;
		}

		public static function upcomingConcertsByMonth( $month, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$concerts = array();
			$stmt = $dbh->prepare( "select c.id from concert c
									where date_format(c.datetime, '%M %Y') = :month 
									and c.datetime > now() order by c.datetime desc;" );
			$stmt->bindParam( "month", $month, PDO::PARAM_STR );
			$stmt->execute();
			while ( $concert = $stmt->fetch( PDO::FETCH_NUM ) )
				$concerts[] = new Concert( $concert[0], $language );
			$stmt->closeCursor();
			return $concerts;
		}

		public static function pastConcertsByMonth( $month, $language = "en" ) {
			$dbh = SPDO::getInstance();
			$concerts = array();
			$stmt = $dbh->prepare( "select c.id from concert c
									where date_format(c.datetime, '%M %Y') = :month 
									and c.datetime < now() order by c.datetime desc;" );
			$stmt->bindParam( "month", $month, PDO::PARAM_STR );
			$stmt->execute();
			while ( $concert = $stmt->fetch( PDO::FETCH_NUM ) )
				$concerts[] = new Concert( $concert[0], $language );
			$stmt->closeCursor();
			return $concerts;
		}

		static function create() {

		}
	}