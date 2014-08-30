<?php

// PHP Session management.
session_start();

define('WEBROOT', '/var/www/');

// Include the most-used classes.
require(WEBROOT .'classes/JsonScript.php');
require(WEBROOT .'classes/User.php');

function return_error($error)
{
	header('Content-type: application/json');
	echo json_encode(array('ERROR', $error));
	exit();
}

//return_error('test');

// Create a mysql object to query with the database.
$Mysql = new mysqli("127.0.0.1", "lygos", "3o_e}.890h.23._lm", "lygos");
if ($Mysql->connect_errno)
	return_error('db_connect');

// Create memcached object to read and write data to the cache.
$Memcached = new Memcached();
$Memcached->addServer('localhost', 11211);

$User = new User();

// Create a new JSON script object and have it execute itself.
$Script = new JSONscript($_GET['script']);
$Script->execute();

?>