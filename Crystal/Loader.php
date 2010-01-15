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
class Crystal_Loader
{

   
    /** LOADS DATABASE ADAPTER
     *  @return object
     */
    function __construct($active_connection)
    {

       /** LOADS ADAPTER **/
       if(self::_check_connection($active_connection) == TRUE)
       {

       	   if(is_array($active_connection))
       	   {
       	   		$this->_driver =  $active_connection['driver'];
       	   }
       	   else
       	   {
       	   		$this->_driver =  Crystal_Config_Reader::get_db_value($active_connection, 'driver');
       	   }
           
       
	   }
       else
       {
           $this->_driver =  Crystal_Config_Reader::get_db_value('default', 'driver');
           

       }
	
		
       $this->_driver = ucfirst($this->_driver);
	  

               
        
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
	
	public function __toString() 
	{
        return $this->_driver;
    }



}
