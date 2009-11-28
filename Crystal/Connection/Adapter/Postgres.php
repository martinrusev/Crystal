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
class Crystal_Connection_Adapter_Postgres
{

    private $db;

    function __construct($database_config, $params=null)
    {
			
		
			/** CHECKS FOR PORT **/
			$port = (isset($database_config['port'])?$database_config['port']:'5432');
			
			
			
			/** CHECKS FOR database in params **/
			if(isset($params) && !empty($params))
			{
				if(array_key_exists('database', $params))
				{
					
				$conn_string = 'host=' . $database_config['hostname'] . ' port=' .  $port . ' dbname=' .  $params['database']
				. ' user=' . $database_config['username'] . ' password=' .  $database_config['password'];	
				
				
				}
				
			}
			else
			{
				$conn_string = 'host=' . $database_config['hostname'] . ' port=' .  $port . ' dbname=' .  $database_config['database']
			. ' user=' . $database_config['username'] . ' password=' .  $database_config['password'];
			}
			
			
			
			
			
            $this->db = pg_connect($conn_string);

             /** SETS DATABASE COLLATION **/
             $this->_set_charset($database_config['char_set']);
          

            if (!$this->db)
            {
               throw new Crystal_Connection_Exception("Cannot connect to database");
            }



            return $this->db;


    }

        
 



    private function _set_charset($charset)
    {
        try
        {   /**
            *  TODO - replace with general database helper
            **/
             pg_query("SET NAMES " . Crystal_Helper_Postgres::add_single_quote($charset));
        }
        catch (Exception $e)
        {
            throw new Crystal_Connection_Adapter_Exception("Cannot set database charset");
        }


      
        
    }


    
}