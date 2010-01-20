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
 * @version     0.3
 */

// ------------------------------------------------------------------------
class Crystal_Query_Postgres_Select 
{

    

 function __construct($method=null,  $columns=null)
    {

    	if($columns !=null)
    	{
    		$this->select = "SELECT";
    		
    		
    		if(is_array($columns))
          	{
			
			  /**  
			   * Exception for non parsed queries: select('products, MIN(price)', False)
			   *
			   **/
			  if(isset($columns[1]) && $columns[1] == FALSE)
			  { 
			  	   $this->select .= ' '.  $columns[0]. ' ';
			  }
			  else
			  {
			  		$total_elements = count($columns);
			  	
			  		/** Legacy function for Crystal 0.2 
			  		 *  WORKS FOR select(array('column,'column2')
			  		 **/	
			  		if($total_elements > 1)
			  		{
			  			$last_column =  end($columns);
			  			
			  			foreach($columns as $value)
		            	{
							if($value != $last_column)
							{
								$this->select .= Crystal_Helper_Postgres::sanitize_string($value) . ", ";
							}
							else
							{
								$this->select .=  Crystal_Helper_Postgres::sanitize_string($value);
							}
		
		            	}	
			  		}
			  		/** Crystal 0.3 and beyond  **/
			  		else
			  		{
			  			/** Checks for special params like :as and explodes the string to array **/
			  			$parsed_columns = Crystal_Parser_String::parse($columns[0]);
			  			
			  			
			  			/** Single column **/
			  			if(is_string($parsed_columns))
			  			{
			  				$this->select .= ' ' . Crystal_Helper_Postgres::sanitize_string($parsed_columns);
			  				
			  			}
			  			/** Single column with params **/
			  			elseif(!isset($parsed_columns[0]))
			  			{
			  				$this->select .= ' ' . Crystal_Helper_Postgres::sanitize_string($parsed_columns['column']);
			  				$this->select .= ' ' . $parsed_columns['param'];
			  				$this->select .= ' ' . Crystal_Helper_Postgres::sanitize_string($parsed_columns['value']);
			  			}
			  			elseif(is_array($parsed_columns))
			  			{
			  				$last_column = end($parsed_columns);
			  				
			  				foreach($parsed_columns as $key => $column)
			  				{
			  					/** CHECKS FOR PARAMS, in 0.3 only :as **/
			  					if(is_array($column))
			  					{
			  						
			  						$this->select .= ' ' . Crystal_Helper_Postgres::sanitize_string($column['column']);
			  						$this->select .= ' ' . $column['param'];
			  						$this->select .= ' ' . Crystal_Helper_Postgres::sanitize_string($column['value']);
			  						
			  					
			  					}
			  					else
			  					{
			  						$this->select .= ' ' . Crystal_Helper_Postgres::sanitize_string($column);
			  					}
			  					
			  					/** ADD COMMA BETWEEN THE COLUMNS **/
			  					if($column != $last_column)
			  					{
			  						$this->select .= ' ,';
			  					}
			  					
			  				}
			  				
			  			}
			  			else
			  			{
			  				throw new Crystal_Query_Postgres_Exception("Invalid parameters in select()");
			  			}
			  						  			
			  		}
				
			   }
			  

         	}
 
    		
    		
    	}
    	else
    	{	
    		/** __toString expects string here **/
    		$this->select = '';
    	}
	
          
      	
		
      
    }

    public function __toString() 
    {
        return $this->select;
    
    }
    
    
}