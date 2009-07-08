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
class Crystal_Methods_Common
{

    private $active_connection;

    public $db; 

    private $_driver;

    static public function db($active_connection)
    {
      	
        $_driver = self::_load_valid_adapter($active_connection);

        $adapter = "Crystal_Methods_" . $_driver . "_Query";
        
		
        $db = new $adapter($active_connection);

        
        return $db;
    
    }


    /** LOADS DATABASE ADAPTER
     *  @return object
     */
    function _load_valid_adapter($active_connection)
    {

       /** LOADS ADAPTER **/
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

    /**
     * CHECKS IF ACTIVE CONNECTION EXISTS
     * @return boolean
     */
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


   

    
}