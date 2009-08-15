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
class Crystal_Manipulation_Postgres_Fields
{

	private $primary_key;
    
	
	/** TODO - MASS DELETE FUNCTION
	 *  
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $params, $table)
    {
    	
		$array_keys = array_keys($params);
		$last_column = end($array_keys);
   	
   
	    switch ($method) 
		{
			
			
			case 'with_fields':
				
		    					
			    foreach ($params as $column => $rows) 
				{
					
					
					$this->fields .= Crystal_Helper::add_double_quote($column) ." ";  
					
					$this->fields .= self::process_rows($rows, $column, $last_column, $table);
						
			    }
			
				if(isset($this->primary_key))
				{
					$this->fields .= $this->primary_key;
				}
	    	break;
			
			
			
	    	case 'add_fields':
				
		    	$this->fields = "ADD";
					
			    foreach ($params as $column => $rows) 
				{
					
					
					$this->fields .= Crystal_Helper::add_apostrophe($column);  
					
					$this->fields .= self::process_rows($rows, $column, $last_column);
						
			    }
	    	break;
			
			case 'remove_fields':
				
				$this->fields = '';
				
				foreach($params as $key => $value)
				{
					$this->fields .= "DROP" . Crystal_Helper::add_apostrophe($value);
					
					
					if($key != $last_column)
					{
						$this->fields .= ",";
					}
					
				}
					
			break;		
		
	    	
	    	default:	
	    	break;
	    
		}
 
    }
	
	
	function process_rows($rows, $column, $last_column, $table)
	{
		$this->row = '';
	
	
		if(array_key_exists('type', $rows))
		{
			
			if($rows['type'] == 'key')
			{
				$this->row .=  "serial";
			}
			else
			{
				$this->row .= strtoupper($rows['type'])  . " ";
			}
			
		}
		
		
		if(array_key_exists('constraint', $rows))
		{
			$this->row .=  "(" .  $rows['constraint'] . ")";
		}
		
		
		if(array_key_exists('choises', $rows))
		{
			
			
			
			$last_field = end($rows['choises']);
						
			$this->row .=  " ( ";
			
			foreach($rows['choises'] as $key => $value)
			{
				
				$this->row .= Crystal_Helper::add_single_quote($value); 
				
				 if($value != $last_field){$this->row .= ","; }
				
			}
			
			$this->row .= ")";
			
		}
			
		
		if(array_key_exists('null', $rows))
		{
			$this->row .=  " NULL";
		}
		else
		{
			$this->row .=  " NOT NULL ";
		}
		
		
		if(array_key_exists('auto_increment', $rows))
		{
			$this->row .=  " AUTO_INCREMENT ";
			
		}
		
		
		
		
		if(array_key_exists('default', $rows))
		{
			$this->row .=  " DEFAULT " . Crystal_Helper::add_single_quote($rows['default']);
			
		}
		
		
		
		if(array_key_exists('primary_key', $rows))
		{
			$this->primary_key =  ", CONSTRAINT " . $table[0] . "_pkey PRIMARY KEY ("  . $column . ")" ;
			
		}
		
		if($column != $last_column)
		{
			$this->row .= ",";
		}
		
		
		return $this->row;
		
	}
	

    public function __toString() 
	{
        return $this->fields;
    }
    
    
}