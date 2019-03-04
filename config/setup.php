<?php
//No error reporting as required by project PDF
error_reporting(0);
require_once 'database.php';
//Connect to database server
$dsn = "mysql:host=$DB_DSN";
$opt = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
try {
	$dbConn = new PDO($dsn, $DB_USER, $DB_PASSWORD, $opt);
	//Create database
	$sql = "CREATE DATABASE IF NOT EXISTS $DB_NAME;";
	$dbConn->exec($sql);
} catch (PDOException $e) {
	echo $e->getMessage()."<br />";
	die();
}
//Connect to database 
$dsn = "mysql:host=$DB_DSN;dbname=$DB_NAME;charset=$charset";
try {
	$dbConn = new PDO($dsn, $DB_USER, $DB_PASSWORD, $opt);
	//Create comments table
	$sql = "CREATE TABLE `comments` (
		`id` int(11) NOT NULL,
		`owner` varchar(256) NOT NULL,
		`image` varchar(256) NOT NULL,
		`comment` varchar(256) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$dbConn->exec($sql);
	//Create images table
	$sql = "CREATE TABLE `images` (
		`id` int(11) NOT NULL,
		`image` varchar(100) NOT NULL,
		`owner` varchar(256) NOT NULL,
		`likes` int(11) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$dbConn->exec($sql);
	//Create users table
	$sql = "CREATE TABLE `users` (
		`id` int(11) NOT NULL,
		`username` varchar(256) DEFAULT NULL,
		`pswd` varchar(256) DEFAULT NULL,
		`email` varchar(256) DEFAULT NULL,
		`notify` int(1) NOT NULL DEFAULT '1',
		`isEmailConfirmed` int(11) DEFAULT '0',
		`token` varchar(256) DEFAULT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$dbConn->exec($sql);
} catch (PDOException $e) {
	echo $e->getMessage()."<br />";
	die();
}