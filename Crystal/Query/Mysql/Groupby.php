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
class Crystal_Query_Mysql_Groupby
{

   
    function __construct($method, $groupby)
    {

    	$this->groupby = '';
			
		if(is_array($groupby) && !empty($groupby))
		{
			
				$this->groupby = " GROUP BY";	
	
				/** WORKS FOR ARRAYS group_by(array('product_id', 'category_id')) **/
				if(isset($groupby[1]))
				{
						
			      	end($groupby);
				    $last_element = key($groupby);
				    reset($groupby);
				    
				    
				    foreach($groupby as $key => $value)
				    {
				    	
				    	$this->groupby  .= Crystal_Helper_Mysql::add_single_quote($value); 
			            
				    	if($key != $last_element)
				    	{
				    		$this->groupby  .= ' , ';
				    		
				    	}
			
			        }
					
				}
				else
				{		
					$filtered_params = Crystal_Parser_String::parse($groupby[0]);
				
					if(is_string($filtered_params))
					{
						$this->groupby  .= Crystal_Helper_Mysql::add_single_quote($filtered_params);
					}
					elseif(is_array($filtered_params) && !empty($filtered_params))
					{
							
						end($filtered_params);
						$last_element = key($filtered_params);
						reset($filtered_params);
							
							
						foreach($filtered_params as $key => $value)
						{
								
							$this->groupby  .= Crystal_Helper_Mysql::add_single_quote($value);
								
							if($key != $last_element)
							{
								$this->groupby .= ' , ';
							}
								
						}
							
							
					}
					else
					{
						throw new Crystal_Query_Exception('Invalid parameters in order_by function');
					}
											
					
				}	
	
	          
	        }
    	
		
      
    }

    public function __toString() 
	{
        return $this->groupby;
    }
    
    
}