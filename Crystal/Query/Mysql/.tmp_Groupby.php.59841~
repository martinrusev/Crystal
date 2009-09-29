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
    	
		
	 $this->groupby = " GROUP BY ";	
		
		
	if(is_array($groupby))
	{

	
			if(!isset($groupby[0]))
			{
					
					
				/** 
				  Works for array type  -> array(key => value)
				*/
		        $last_element = end($groupby);
			    foreach($groupby as $key => $value)
			    {
		            	if($key == $last_element)
			        	{
			             $this->groupby  .= Crystal_Helper::add_single_quote($key) . ' ' 
						 .  $value . ' ,';
		                }
		                else
		                {
		                    $this->groupby  .= Crystal_Helper::add_single_quote($key) 
							. $value;
		                }
		
		        }
				
			}
			else
			{
				
					$this->groupby  .= Crystal_Helper::add_single_quote($groupby[0]). ', ' 
					. Crystal_Helper::add_single_quote($groupby[1]);
					
				
			}	

          
        }
        else
        {

           $this->order = FALSE;

        }
    	
		
      
    }

    public function __toString() 
	{
        return $this->groupby;
    }
    
    
}