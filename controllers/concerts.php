<?php
	$monthsUpcoming = Concert::monthsUpcoming( LANG );
	$monthsPast = Concert::monthsPast( LANG );
	
	include_once "views/concerts.php";