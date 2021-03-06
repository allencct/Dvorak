<?php

// Begin capturing output to a buffer.
ob_start();
// PHP Session management.
session_start();

// The directory path for this file on the web-server:
define('WEBROOT', '');

// Include the most-used classes.
require(WEBROOT .'classes/Page.php');
require(WEBROOT .'classes/User.php');
require(WEBROOT .'classes/Database_Row.php');
require(WEBROOT .'classes/Colony.php');

require(WEBROOT .'global_lib.php');
require(WEBROOT .'lib.php');


// Create a mysql object to query with the database.
$Mysql = new mysqli("localhost", "lygos", "3o_e}.890h.23._lm", "lygos"); //127.0.0.1
if ($Mysql->connect_errno)
    exit('Could not connect to Lygos database. Please try again later.');

// Create memcached object to read and write data to the cache.
if ( class_exists('Memcached') )
{
	$Memcached = new Memcached();
	$Memcached->addServer('localhost', 11211);
}
else
	$Memcached = false;

$User = new User();

// Create a web page.
$Page = new Page($_GET['p'], 'game');
$Page->execute();
$Page->render();


//echo '<br /><br />---------------------------------------------------<br />
//	debugging output:<br />';
//print_arr($User);
//necho('Session Data:');
//print_arr($_SESSION);
//necho('Cookies:');
//print_arr($_COOKIE);

// Print the entire output buffer.
ob_flush();

?>