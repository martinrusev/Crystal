<?php
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal-project.net
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
	  	
        $_driver =  new Crystal_Loader($active_connection, $additional_config_params);
        
        
		if (!isset($db)) 
		{
             $db = new Crystal_Query_Builder($active_connection, $additional_config_params);
        } 
        
        return $db;

    
    }
	

}