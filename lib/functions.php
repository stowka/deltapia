<?php
	/**
	 * @author Antoine De Gieter
	 *
	 * Auxiliary functions
	 *
	 */
	 function truncateTextByWords( $text, $number = 25 ) {
		$words = explode(" ", $text );
		$truncatedText = "";
		for ($i = 0; $i < $number; $i++) :
			$truncatedText .= $words[$i] . " ";
		endfor;
		return $truncatedText . "...";
	}

	function truncateTextByChars( $text, $number = 32 ) {
		$truncatedText = substr( $text, 0, $number );
		if ( $truncatedText < $text )
			return $truncatedText . "...";
		return $truncatedText;
	}