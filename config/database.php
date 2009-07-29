<?php  if ( ! defined('CRYSTAL_BASEPATH')) exit('No direct script access allowed');
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		MicroORM
 * @author		Martin Rusev
 * @link		http://orm.martinrusev.net
 * @since		Version 0.1
 * @version     0.1
 */

// ------------------------------------------------------------------------

/**
 * Config file
 *
 * This file is used for microORM configuration.
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
 *               Currently supported: mysql,postgres, sqlite
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database.
|   ['port'] The character collation used in communicating with the database.
|
| 
*/
$db = array();
$db['development']['hostname'] = "localhost";
$db['development']['username'] = "root";
$db['development']['password'] = "";
$db['development']['database'] = "";
$db['development']['driver'] = "mysql";
$db['development']['pconnect'] = TRUE;
$db['development']['db_debug'] = TRUE;
$db['development']['cache_on'] = FALSE;
$db['development']['db_log']   = FALSE;
$db['development']['char_set'] = "utf8";
$db['development']['dbcollat'] = "utf8_general_ci";


$db['production']['hostname'] = "localhost";
$db['production']['username'] = "root";
$db['production']['password'] = "";
$db['production']['database'] = "";
$db['production']['driver'] = "mysql";
$db['production']['pconnect'] = TRUE;
$db['production']['db_debug'] = TRUE;
$db['production']['cache_on'] = FALSE;
$db['production']['db_log']   = FALSE;
$db['production']['char_set'] = "utf8";
$db['production']['dbcollat'] = "utf8_general_ci";


$db['default']['hostname'] = "localhost";
$db['default']['username'] = "root";
$db['default']['password'] = "";
$db['default']['database'] = "";
$db['default']['driver']   = "sqlite";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache']    = 'memcached';
$db['default']['db_log']   = TRUE;
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";

