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
class Crystal_Connection_Adapter_Sqlite
{

    private $db;

    function __construct($database_config)
    {
				
			
           // $this->db = ($database_config['database'], 0666);

                    

            if (!$this->db)
            {
               throw new Crystal_Connection_Exception("Cannot open database");
            }



            return $this->db;


    }

        
 

    
}