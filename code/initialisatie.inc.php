<?php
session_start();

$_srv = $_SERVER['PHP_SELF'];
$_output="";
$_jsInclude="";
$_msg = isset($_GET["msg"]) ? $_GET["msg"] : " ";
$_userInfoDisplay = array();
$_userInfoDisplay[0] = false;

/* Include */
// connect to db
require_once("../connections/pdo.inc.php");
// call function for db based dropdown function
require_once("../php_lib/dropDown.inc.php");
// call fucntion to create query
require_once("../php_lib/createSelect.inc.php");
// call function to open html file
require_once("../php_lib/inlezen.inc.php");

// authorise user for script
define('DEVELOPMENT_MODE', true); // development
require_once('../php_lib/authorised.inc.php');
authorised();
?>