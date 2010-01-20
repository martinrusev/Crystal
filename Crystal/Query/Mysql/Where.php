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
class Crystal_Query_Mysql_Where
{

    

    function __construct($method, $params = null)
    {
		
		$first_element = key($params);
		$last_element = end($params);
		
		/** _toString expects string **/
		$this->where = '';
		
		
		switch ($method) 
		{
			case 'where':
				case 'where':
				
				/** WORKS WITH STRING PARAMETER 
				 * where('client_status',active') 
				 * where('client_status : active')
				 ***/
				if($first_element == '0')
				{
					if(isset($params[1]))
					{
						$this->where .= " WHERE " . Crystal_Helper_Mysql::add_apostrophe($params[0])
						. " =". Crystal_Helper_Mysql::add_single_quote($params[1]);
						
					}
					/** SINGLE PARAMETER AND COLONS : **/
					else
					{
						$parsed_params = Crystal_Parser_String::parse($params[0]);
						
						if(is_array($parsed_params))
						{
							
							/** CHECKS FOR MULTIPLE PARAMETERS SEPARATED BY COMA **/
							if(isset($parsed_params[0]))
							{	
								reset($parsed_params);
								$first_parameter = key($parsed_params);
							
								foreach($parsed_params as $k => $v)
								{
									if($k == $first_parameter)
									{
										$this->where .= ' WHERE';
										
									}
									else
									{
										$this->where .= 'AND';
									}
									
									$this->where .= Crystal_Helper_Mysql::add_apostrophe($v['column']);
				  					$this->where .= $v['param'];
				  					$this->where .= Crystal_Helper_Mysql::add_single_quote($v['value']);
								
								}
								
							}
							/** WORKS FOR SINGLE ELEMENT **/
							else
							{
								$this->where .= ' WHERE';
								$this->where .= Crystal_Helper_Mysql::add_apostrophe($parsed_params['column']);
				  				$this->where .= $parsed_params['param'];
				  				$this->where .= Crystal_Helper_Mysql::add_single_quote($parsed_params['value']);
								
								
							}
								
							
						}
						else
						{
							$this->where .= " WHERE " . Crystal_Helper_Mysql::add_apostrophe($params[0]);
						}
					
						
					}
						
				}
				/** WORKS FOR arrays where(arrray('client_status' => 'active')); Legacy function -- will be depricated **/
				else
				{
					
					foreach($params as $key => $value)
					{
		          		
			            if($key == $first_element)
			            {
			            	
							$this->where .= " WHERE " . Crystal_Helper_Mysql::add_apostrophe($key)
							. " ="  . Crystal_Helper_Mysql::add_single_quote($value);
			            }
			            else
			            {
							$this->where .= " AND ". Crystal_Helper_Mysql::add_apostrophe($key)
							 . " ="  . Crystal_Helper_Mysql::add_single_quote($value);
			            }
		
					}
					
				}
			break;
		
			case 'and':
				if($first_element == '0')
				{
					if(isset($params[1]))
					{
						$this->where .= " AND " . Crystal_Helper_Mysql::add_apostrophe($params[0])
						. " = "  . Crystal_Helper_Mysql::add_single_quote($params[1]);
						
					}
					else
					{
						$this->where .= " AND " . Crystal_Helper_Mysql::add_apostrophe($params[0]);
					}
						
				}
				else
				{
					
					foreach($params as $key => $value)
					{
		          		
			            if($key == $first_element)
			            {
			            	
							$this->where .= " AND " . Crystal_Helper_Mysql::add_apostrophe($key)
							. " = "  . Crystal_Helper_Mysql::add_single_quote($value);
			            }
			            else
			            {
							$this->where .= " AND " . Crystal_Helper_Mysql::add_apostrophe($key)
							 . " = "  . Crystal_Helper_Mysql::add_single_quote($value);
			            }
		
					}
					
				}
			break;
			
			
			
			
			
			case 'or':				
				if($first_element == '0')
				{
						$this->where .= " OR " . Crystal_Helper_Mysql::add_single_quote($params[0]);
				}
				else
				{
					
					foreach($params as $key => $value)
					{
		           
					$this->where .= " OR " . Crystal_Helper_Mysql::add_apostrophe($key)
					. " = "  . Crystal_Helper_Mysql::add_single_quote($value);
		           
					}
					
				}
			break;
			
			
			
			
			
			
			case 'in':
				$this->where .= " IN (";
				
				foreach($params as $key => $value)
				{
					if($value != $last_element)
					{
						$this->where .= Crystal_Helper_Mysql::add_apostrophe($value) .",";
					}
					else
					{
						$this->where .= Crystal_Helper_Mysql::add_apostrophe($value);
					}
					
				}
				$this->where .= ")";
			break;
			
			
			
			
			
			case 'like':
				$this->where .= " LIKE ";
				$this->where .= Crystal_Helper_Mysql::add_single_quote("%" . $params[0] . "%") ;
			break;
			
			
			
			
			
			default:
				throw new Crystal_Query_Mysql_Exception("Invalid method: " . $method);
			break;
		}

      
    }

    public function __toString() 
	{
        return $this->where;
    }
    
    
}