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
 * @version     0.3
 */

// ------------------------------------------------------------------------
class Crystal_Loader
{

   
    /** LOADS DATABASE ADAPTER
     *  @return object
     */
    function __construct($active_connection , $additional_parameters = null)
    {
	  
       /** LOADS ADAPTER **/
       if(self::_check_connection($active_connection) == TRUE)
       {

       	   /** For configuration arrays **/ 	
       	   if(is_array($active_connection) && !empty($active_connection))
       	   {
       	   		$this->_driver =  $active_connection['driver'];
       	   }
       	   /** For configuration files stored at different location **/
       	   else
       	   {
       	   		$this->_driver = Crystal_Config_Reader::get_db_value($active_connection, 'driver', $additional_parameters);
       	   }
           
       
	   }
	   /** WORKS WITH NO PARAMETERS Crystal::db(); */
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
