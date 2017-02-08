<?php

// Make sure output buffering is turned on before attempting page redirects.
// Best to turn it on in php.ini, but the line below ensures it is on.
ob_start();

// Turns off any browser built-in XSS protections
// LEAVE THIS LINE IN WHILE YOU ARE LEARNING
// We want to get punished for any XSS mistakes...
header('X-XSS-Protection: 0');

// Assign path shortcuts to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("SHARED_PATH", PRIVATE_PATH . '/shared');
define("PUBLIC_PATH", PROJECT_PATH . '/public');

require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');

$db = db_connect();

?>
