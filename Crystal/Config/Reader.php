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
 * @version     0.3
 *  
 *  CONFIG READER - USED TO RETRIEVE CONFIGURATION VALUES 
 *
 */
class Crystal_Config_Reader
{

   
    
    static public function get_db_value($configuration, $value, $additional_config_params = null)
    {
		
    	
    	$configuration_options = self::_set_configuration_settings($configuration, $additional_config_params);
        include($configuration_options['file']);
    	$config_value = $db[$configuration_options['key']][$value];
        	
	    if(isset($config_value) && !empty($config_value))
		{
			return $config_value;
		}
		else
		{
			throw new Crystal_Config_Exception("Cannot find key: " . $configuration_options['key'] . ' in ' . $configuration_options['file']);
		}
        	
	        
       
    
    }


    static public function get_db_config($configuration = null, $additional_config_params = null)
    {

		$configuration_options = self::_set_configuration_settings($configuration, $additional_config_params);
		include($configuration_options['file']);
        $config_value = $db[$configuration_options['key']];
        
        if(isset($config_value) && !empty($config_value))
        {
            return $config_value;
        }
        else
        {
            throw new Crystal_Config_Exception("Cannot find key:" . $configuration_options['key'] . " in " . $configuration_options['file']);
        }

        
    }
    
    
    
    private static function _set_configuration_settings($configuration, $additional_config_params = null)
    {
    	
    	
    	$config_options = array();
    	
    	
    	if(file_exists($configuration))
    	{
    		$config_options['file'] = $configuration;	
    		$config_options['type'] = 'file';	
    		
    		if(isset($additional_config_params) && !empty($additional_config_params))
    		{
    			$config_options['key'] = $additional_config_params;
    		}
    		else
    		{
    			$config_options['key'] = 'default';
    		}
    		
    		
    	}
    	else
    	{
    		$config_options['file'] = CRYSTAL_CONFIG;
    		$config_options['type'] = 'default';	
    		
    		if(isset($configuration) && !empty($configuration))
    		{
    			$config_options['key'] = $configuration;
    		}
    		else
    		{
    			$config_options['key'] = 'default';
    		}
    		
    		
    		
    		
    	 }

    	 return $config_options;
    	
    	
    	
    	 
    	
    	
    	
    	
    }
    
    
    


  

    
}