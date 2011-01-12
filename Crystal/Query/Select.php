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
class Crystal_Query_Select 
{

    function __construct($method=null,  $columns=null)
    {
    	$this->query->type = 'select';
    	
    	if($columns !=null)
    	{
    		if(is_array($columns))
          	{
			
			  /**  
			   * Exception for non parsed queries: select('products, MIN(price)', False)
			   *
			   **/
			  if(isset($columns[1]) && $columns[1] == FALSE)
			  { 
			  	   $this->query->sql = "SELECT ?";
			  	   $this->query->params = $columns[0];
			  }
			  else
			  {
			  		$total_elements = count($columns);
			  	
		  			/** Checks for special params like :as and explodes the string to array **/
		  			$parsed_columns = Crystal_Parser_String::parse($columns[0]);
		 
		  			
		  			/** Single column **/
		  			if(is_string($parsed_columns['string']))
		  			{
		  				$this->query->sql = "SELECT ?";
			  	   		$this->query->params = $parsed_columns['string'];
		  				
		  			}
		  			/** Single column with params **/
		  			elseif(!isset($parsed_columns[0]))
		  			{
		  				$this->select .= Crystal_Helper_Mysql::add_apostrophe($parsed_columns['column']);
		  				$this->select .= $parsed_columns['param'];
		  				$this->select .= Crystal_Helper_Mysql::add_apostrophe($parsed_columns['value']);
		  			}
		  			elseif(is_array($parsed_columns))
		  			{
		  				
		  				$this->query->sql = "SELECT ";
		  				$last_key = end($parsed_columns);
		  				
		  				foreach($parsed_columns as $key => $column)
		  				{
		  					/** checks for column aliases select('producsts p') */
		  					if(ereg(" ", $column)) 
		  					{
		  						
		  						$this->query->sql .= "? ? ";
		  						
		  						$this->query->params[] = explode(' ', $column);
		  					}
		  					else
		  					{
		  						$this->query->sql .= '? ';
		  						$this->query->params[] = $column;
		  						
		  					}
		  					
		  					if($column != $last_key){ $this->query->sql .= ','; }
		  				}
		  				
		  			}
		  			else
		  			{
		  				throw new Crystal_Query_Exception("Invalid parameters in select()");
		  			}
			  						  			
			  		
				
			   }
			  

         	}
 
    		
    		
    	}
    	else
    	{	

    		$this->query->sql = null;
    	}
	
          
      	
		return $this->query;
      
    }

  
    
}