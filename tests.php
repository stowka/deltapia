<?php
	header( 'Content-Type: text/plain; charset=utf-8' );
	require_once "config/config.inc";

	define( "COUNTRY", "AT" );
	Concert::monthPast();