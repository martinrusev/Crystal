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
class Crystal_Query_Mysql_Orderby 
{

    

    function __construct($method=null, $order=null)
    {
  

		if(is_array($order))
		{
			
				$this->order = " ORDER BY ";
			
				if(!isset($order[0]))
				{
		
					/** 
					*  Works for array type  -> array(key => value)
				    */
			        end($order);
			        $last_element = key($order);
			        reset($order);
			        
				    foreach($order as $key => $value)
				    {
	
			            	if($key != $last_element)
				        	{
				             $this->order  .= Crystal_Helper_Mysql::add_apostrophe($key) . ' ' 
							 .  $value . ' ,';
			                }
			                else
			                {
			                    $this->order  .= Crystal_Helper_Mysql::add_apostrophe($key) . ' '
								. $value;
			                }
			
			         }
					
					
					
					
					
				}
				else
				{
					
					$filtered_params = Crystal_Parser_String::parse($order[0]);
					
					/** WORKS FOR SINGLE ELEMENTS **/
					if(is_string($filtered_params))
					{
						
						$filtered_order = self::_check_order($filtered_params);
						print_r($filtered_order);
						
											
						$this->order  .= Crystal_Helper_Mysql::add_apostrophe($filtered_order['column']). ' ' 
						. $filtered_order['order'];
						
					}
					else
					{
						
						end($filtered_params);
			        	$last_element = key($filtered_params);
			        	reset($filtered_params);
						
						foreach($filtered_params as $key => $value)
						{
							$filtered_order = self::_check_order($value);
							
							
							$this->order  .= Crystal_Helper_Mysql::add_apostrophe($filtered_order['column']). ' ' 
							. $filtered_order['order'];
							
							if($key != $last_element)
							{
								$this->order .=',';
							}
							
						}
						
						
					}
					
					
				}
	
			
			}
	        else
	        {
	
	           $this->order = '';
	
	        }
    	
		
      
    }
    
    private function _check_order($string)
    {
    	$asc = strpos($string, '-');
    	
    	$order = array();
    	
		if($asc == True or $asc === 0)
    	{
    		
    		$order['column'] = preg_replace('/-/', '', $string, 1);
    		$order['order'] = 'ASC';	
    		
    	}
    	else
    	{
    		
    		$order['column'] = $string;
    		$order['order'] = 'DESC';
    		
    	}
    	
    	return $order;
    	
    }


    public function __toString() 
	{
        return $this->order;
    }
    
    
}