<?php  if ( ! defined('CRYSTAL_BASEPATH')) exit('No direct script access allowed');
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal - php database toolkit
 * @author		Martin Rusev
 * @link		http://crystal.martinrusev.net
 * @since		Version 0.1
 * @version     0.1
 */


/**
 * Config file
 *
 * This file is used for Crystal database configuration.
 *
 *
 *

| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type
 *               Currently supported: mysql,postgres
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database.
|   ['port'] The character collation used in communicating with the database.
|
| 
*/
$db = array();

$db['default']['hostname'] = "localhost";
$db['default']['username'] = "";
$db['default']['password'] = "";
$db['default']['database'] = "";
$db['default']['driver']   = "";
$db['default']['pconnect'] = TRUE;
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";



