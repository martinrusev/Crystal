<?php


class Crystal_DB
{

    static function load_db($connection=null)
    {


    $db_driver = self::_select_db_drivers($connection);


    /** TODO -- ADD EXCEPTION IF DATABASE DRIVER NOT FOUND **/
    require_once(BASE. DS . 'db_drivers' . DS . $db_driver . DS . 'db_methods' . EXT);

    $db =& new DB_methods;


    return  $db;


    }


    static function load_utilities($connection=null)
    {


    $db_driver = self::_select_db_drivers($connection);
    $log_enabled = Config::get_db_value('default', 'db_log');

    if($log_enabled == TRUE)
    {
       require_once(BASEPATH. DS . 'Log' . DS . 'Writer' . EXT);
    }

    require_once(BASE. DS . 'db_drivers' . DS . $db_driver . DS . 'db_utilities' . EXT);

    $db =& new DB_Utilities($connection, $log_enabled);

    return  $db;



    }


    private function _select_db_drivers($connection)
    {


    /* CHECKS FOR PREFERED CONNECTION SETTINGS **/
    if(isset($connection))
    {
        $db_driver =  Config::get_database_value($connection, 'dbdriver');


    }
    /* .. AND FALLS BACK TO DEFAULT **/
    else
    {
        $db_driver =  Config::get_db_value('default', 'dbdriver');


    }


        return $db_driver;



    }



}
