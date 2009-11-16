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

    static public function db($active_connection)
    {
      	static $db;
	  
        $_driver =  new Crystal_Loader($active_connection);

        $adapter = "Crystal_Query_" . $_driver . "_Query";
        
		if (!isset($db)) 
		{
             $db = new $adapter($active_connection);
        } 
        
        return $db;

    
    }
	

}