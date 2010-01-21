<?php
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal.martinrusev.net
 * @since		Version 0.1
 * @version     0.1
 */

// ------------------------------------------------------------------------
class Crystal_Query_Common
{

    private $active_connection;

    public $db; 

    private $_driver;

	/** LAZY DATABASE DRIVER LOADING **/
    static public function db($active_connection, $additional_config_params = null)
    {
      	static $db;
	  	
        $_driver =  new Crystal_Loader($active_connection, $additional_config_params);
        
        $adapter = "Crystal_Query_" . $_driver . "_Query";
   
        
		if (!isset($db)) 
		{
             $db = new $adapter($active_connection, $additional_config_params);
        } 
        
        return $db;

    
    }
	

}