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

class Crystal_Connection_Manager
{


    private $conn;
    

    function __construct($connection = null)
    {

		
        /** GETS PREFERED CONNECTION DETAILS **/
        if(isset($connection))
        {
            $db_config = Crystal_Config_Reader::get_db_config($connection);
        }
        /** FALLS BACK TO DEFAULT **/
        else
        {
           $db_config = Crystal_Config_Reader::get_db_config('default');
        }


        if ($db_config == false )
        {
            throw new Crystal_Connection_Exception("Invalid configuration file.");
        }
        elseif(!isset($db_config['driver']) && empty($db_config['driver']))
        {

             throw new Crystal_Connection_Exception("Invalid database adapter");
            
        }


        /** CHECKS DATABASE DRIVER **/
        switch ($db_config['driver'])
        {
            case 'mysql':
            $this->conn = new Crystal_Connection_Adapter_Mysql($db_config);
            break;

            default:
            throw new Crystal_Connection_Exception("Invalid database adapter");
            break;
        }



        return $this->conn;


    }


    


    

    
}

