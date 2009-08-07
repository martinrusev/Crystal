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
      	
        $_driver =  new Crystal_Loader($active_connection);

        $adapter = "Crystal_Query_" . $_driver . "_Query";
        
		
        $db = new $adapter($active_connection);

        
        return $db;
    
    }


	
	/*
    function _load_valid_adapter($active_connection)
    {

      
       if(self::_check_connection($active_connection) == TRUE)
       {
    
           $_driver =  Crystal_Config_Reader::get_db_value($active_connection, 'driver');
       
	   }
       else
       {
           $_driver =  Crystal_Config_Reader::get_db_value('default', 'driver');
           

       }
	
		
       $_driver = ucfirst($_driver);
	  

       return $_driver;
        
        
    }

   
    private function _check_connection($active_connection)
    {

        if(isset($active_connection) && !empty($active_connection))
        {

            return TRUE;
            
        }
        else
        {
            return FALSE;
        }
        
    }

	*/
   

    
}