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
class Crystal_Connection_Adapter_Mysql
{

    private $db;

    function __construct($database_config, $params=null)
    {
			
		
			/** CHECKS FOR PORT **/
			$port = (isset($database_config['port'])?$database_config['port']:'3306');
			$hostname = (isset($database_config['hostname'])?$database_config['hostname']:'localhost');
			
            $this->db = mysql_connect($hostname. ':'. $port, $database_config['username'], $database_config['password']);

             /** SETS DATABASE COLLATION **/
             $this->_set_charset($database_config['char_set']);
          

            if (!$this->db)
            {
               throw new Crystal_Connection_Exception("Cannot connect to database");
            }
			
			
			
			/** CHECKS FOR database in params **/
			if(isset($params) && !empty($params))
			{
				if(array_key_exists('database', $params))
				{
					
				$dbselect = mysql_select_db($params['database']);
				
				}
				
			}
			else
			{
				$dbselect = mysql_select_db($database_config['database']);
			}
			
            

            if(!$dbselect)
            {
                throw new Crystal_Connection_Adapter_Exception("Cannot select database: " . mysql_error() );
            }


            return $this->db;


    }

        
 



    private function _set_charset($charset)
    {
    	
    	if(isset($charset) && !empty($charset))
    	{
    		 mysql_query("SET NAMES " . $charset);
    	}
    	else
    	{
    		mysql_query("SET NAMES utf8");
    	}
       
    }


    
}