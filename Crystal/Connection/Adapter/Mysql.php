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

    function __construct($database_config)
    {

            $this->db = mysql_connect($database_config['hostname'], $database_config['username'], $database_config['password']);

             /** SETS DATABASE COLLATION **/
             $this->_set_charset($database_config['char_set']);
          

            if (!$this->db)
            {
               throw new Crystal_Connection_Exception("Cannot connect to database");
            }

            $dbselect = mysql_select_db($database_config['database']);

            if(!$dbselect)
            {
                throw new Crystal_Connection_Adapter_Exception("Cannot select database" . $database_config['database']);
            }


            return $this->db;


    }

        
 



    private function _set_charset($charset)
    {
        try
        {   /**
            *  TODO - replace with general database helper
            **/
             mysql_query("SET NAMES " . Crystal_Methods_Mysql_Helper::add_single_quote($charset));
        }
        catch (Exception $e)
        {
            throw new Crystal_Connection_Adapter_Exception("Cannot set database charset");
        }


      
        
    }


    
}