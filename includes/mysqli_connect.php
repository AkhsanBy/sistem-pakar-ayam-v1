<?php
	$DB_HOSTNAME = 'localhost';
	$DB_USERNAME = 'root';
	$DB_PASSWORD = '';
	$DB_DATABASE = 'webuser_sistempakar';
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	try {
		$mysqli = new mysqli($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
		$mysqli->set_charset('utf8mb4');
	} catch (Exception $e) {
		error_log($e->getMessage());
		exit('Gagal terhubung dengan database');
	}
	