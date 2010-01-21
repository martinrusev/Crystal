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
class Crystal_Query_Postgres_Orderby 
{

    

	function __construct($method=null, $order=null)
    {
  

		if(is_array($order) && !empty($order))
		{
				$this->order = " ORDER BY ";
				
				/** WORKS FOR ARRAYS WITH NON NUMERIC KEYS array('product_id' => 'ASC') **/
				if(!isset($order[0]))
				{

			        end($order);
			        $last_element = key($order);
			        reset($order);
			        
				    foreach($order as $key => $value)
				    {
	
			            	if($key != $last_element)
				        	{
				             $this->order  .= Crystal_Helper_Postgres::sanitize_string($key) . ' ' 
							 .  $value . ' ,';
			                }
			                else
			                {
			                    $this->order  .= Crystal_Helper_Postgres::sanitize_string($key) . ' '
								. $value;
			                }
			
			         }
					
					
					
					
					
				}
				else
				{
					
					if(!isset($order[1]))
					{
						
						$filtered_params = Crystal_Parser_String::parse($order[0]);
						
						/** WORKS FOR SINGLE ELEMENTS order_by('product_id') **/
						if(is_string($filtered_params))
						{
							
							$filtered_order = self::_check_order($filtered_params);
							
												
							$this->order  .= Crystal_Helper_Postgres::sanitize_string($filtered_order['column']). ' ' 
							. $filtered_order['order'];
							
						}
						/** WORKS FOR MULTIPLE ELEMENTS order_by('product_id, -category_id') **/
						else
						{
							
							end($filtered_params);
				        	$last_element = key($filtered_params);
				        	reset($filtered_params);
							
							foreach($filtered_params as $key => $value)
							{
								$filtered_order = self::_check_order($value);
								
								
								$this->order  .= Crystal_Helper_Postgres::sanitize_string($filtered_order['column']). ' ' 
								. $filtered_order['order'];
								
								if($key != $last_element)
								{
									$this->order .=',';
								}
								
							}
							
							
						}
						
						
						
					}
					/** CHECK FOR SECOND PARAMETER 
					 *  WORKS FOR order_by('product_id', 'ASC')
					 * @var string
					 */
					else
					{
						
						$this->order  .= Crystal_Helper_Postgres::sanitize_string($order[0]). ' ' 
							. $order[1];
						
						
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