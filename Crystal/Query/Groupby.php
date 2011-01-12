<?php
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.1
 * @version     0.5
 */

// ------------------------------------------------------------------------
class Crystal_Query_Groupby
{

   
    function __construct($method, $groupby)
    {

    	$this->query->type = 'groupby';
			
		if(is_array($groupby) && !empty($groupby))
		{
			
				$this->query->sql = " GROUP BY";	
			
				$filtered_params = Crystal_Parser_String::parse($groupby[0]);
			
				print_r($filtered_params);
				/** SINGLE PARAMETER HERE */
				if(is_string($filtered_params['string']))
				{
					$this->query->sql .= " ?";
					$this->query->params = $filtered_params['string'];	
					
				}
				elseif(is_array($filtered_params) && !empty($filtered_params))
				{
					
					end($filtered_params);
					$last_element = key($filtered_params);
					reset($filtered_params);
						
						
					foreach($filtered_params as $key => $value)
					{
						
						$this->query->sql .= " ?";	
						$this->query->params[] = $value;
							
						if($key != $last_element){  $this->query->sql .= ','; }
							
					}
						
						
				}
				else
				{
					throw new Crystal_Query_Exception('Invalid parameters in the group_by function');
				}
											
	          
	        }
    	
		
	    return $this->query;
      
    }


    
}