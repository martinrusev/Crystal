<?php
/**
 *  Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal.martinrusev.net
 * @since		Version 0.1
 * @version     0.1
 *  
 *  CONFIG FILE - USED TO RETRIEVE CONFIG VALUES 
 *
 */


/** TODO - REFACTORING **/
class Crystal_Config_Reader
{

   
    
    static public function get_db_value($key, $value)
    {

       
        require(CRYSTAL_BASE . CRYSTAL_DS . 'config' . CRYSTAL_DS . 'database.php');

     
        if(isset($db[$key][$value]) && !empty($db[$key][$value]))
        {
            return $db[$key][$value];
        }
        else
        {
            throw new Crystal_Config_Exception("Cannot find key '" . $key . "'  in configuration array");
        }
       
    
    }


    static public function get_db_config($key)
    {


        require(CRYSTAL_BASE . CRYSTAL_DS . 'config' . CRYSTAL_DS . 'database.php');
		

         if(isset($db[$key]) && !empty($db[$key]))
        {
            return $db[$key];
        }
        else
        {
            throw new Crystal_Config_Exception("Cannot find key '" . $key . "'  in configuration array");
        }

        return $db[$key];
        
    }


  

    
}