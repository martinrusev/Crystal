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
class Crystal_Methods_Mysql_Groupby
{

    

    function __construct($method, $groupby)
    {
		
		
	if(isset($groupby))
	{

       $last_element = end($groupby);

	    $this->groupby = " GROUP BY ";


	    foreach($groupby as $key => $value)
	    {
            if($key == $last_element)
	        {
	             $this->groupby  .= Crystal_Methods_Mysql_Helper::add_single_quote($key) . ' ' 
				 .  $value . ' ,';
                }
                else
                {
                    $this->groupby  .= Crystal_Methods_Mysql_Helper::add_single_quote($key) 
					. $value;
                }

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