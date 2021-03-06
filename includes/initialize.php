<?php
//defines the core paths to allow for the require_once to work
//DIRECTORY_SEPERATOR a pre-defined constant  (\ for windows , / for unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//SITE_ROOT::defines the file system path to the project
//must be changed if on a different machine
defined('SITE_ROOT')?null:
define('SITE_ROOT', DS.'var'.DS.'www'.DS.'html'.DS.'trans_fast');

//LIB_PATH::defines the path to the includes folder which contains all
//the libraries
defined('LIB_PATH')?null:define('LIB_PATH', SITE_ROOT.DS.'includes');

//setting the default timezone
date_default_timezone_set('Etc/UTC');

//load the config file first
require_once(LIB_PATH.DS."config.php");

//load basic functions next so that the rest of the loaded files can
//uses these two (config.php and functions.php)
require_once(LIB_PATH.DS.'functions.php');

//load core objects
//require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'PHPMailer'.DS.'PHPMailerAutoload.php');
// require_once(LIB_PATH.DS.'log.php');
// require_once(LIB_PATH.DS.'pagination.php');

//load database-related classes
require_once(LIB_PATH.DS.'models'.DS.'applicant.php');
require_once(LIB_PATH.DS.'models'.DS.'recipient.php');
require_once(LIB_PATH.DS.'models'.DS.'payment.php');
require_once(LIB_PATH.DS.'models'.DS.'transcript.php');
require_once(LIB_PATH.DS.'models'.DS.'email.php');
require_once(LIB_PATH.DS.'models'.DS.'message.php');
// require_once(LIB_PATH.DS.'user.php');
// require_once(LIB_PATH.DS.'photograph.php');

?>
