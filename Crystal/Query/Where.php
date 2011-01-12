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
 * @version     0.5
 */

// ------------------------------------------------------------------------
class Crystal_Query_Where
{


    function __construct($method, $params = null)
    {
		
    	
    	
		$first_element = key($params);
		$last_element = end($params);
		
		switch ($method) 
		{
			case 'where':
				case 'where':
					
					
				$this->query->type  = 'where';
				
				/** WORKS WITH STRING PARAMETER 
				 * where('client_status',active') 
				 * where('client_status : active')
				 ***/
				if($first_element == '0')
				{
					
					if(isset($params[1]))
					{
						
						
						// DISABLE SQL ESCAPING
						if($params[1] == false)
						{
							$this->query->sql = "WHERE ?";
							$this->query->params = $params[0];
				
						}
						else
						{
							/** THE NEW UNIFIED SYNTAX COMES HERE
							 *  
							 *  where('product_id : ?, client_id : ?',1,2)
								@params 0 is the query, 1 and beyond are the params
							*/
							$parsed_columns = Crystal_Parser_String::parse($params[0]);
							$sliced_params = array_slice($params, 1);
							
							
							$this->query->sql = "WHERE ? = ? ";
							// REPEAT AND 
							$total_params = count($sliced_params)-1 ; // substract the WHERE part
							$this->query->sql .= str_repeat("AND ? = ?", $total_params);
							
							
							foreach($parsed_columns as $key => $value)
							{
								
								$this->query->params[] = array($value['column'], $sliced_params[$key]);
							}
							
							$this->query->sql = "WHERE ? = ?";
							$this->query->params = $params;
						
						}
						
						
						
					}
					/** SINGLE PARAMETER AND COLONS : **/
					else
					{
						$parsed_params = Crystal_Parser_String::parse($params[0]);
						print_r($parsed_params);
						
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
				
				$this->query->type  = 'and';
				
				
				if($first_element == '0')
				{
					if(isset($params[1]))
					{
						
						$this->query->sql = "AND ? = ?";
						$this->query->params = $params;
						
					}
					else
					{
						$this->query->sql = "AND ? = ?";
						$this->query->params = $params[0];
					}
						
				}
				else
				{
					
					foreach($params as $key => $value)
					{
		          		
			            if($key == $first_element)
			            {
			            	$this->query->sql = "AND ? = ?";
							$this->query->params = array($key, $value);
			            }
			            else
			            {
							$this->query->sql = "AND ? = ?";
							$this->query->params = array($key, $value);
			            }
		
					}
					
				}
			break;
			
			
			
			
			
			case 'or':				
				if($first_element == '0')
				{
					$this->query->sql = "OR ? ";
					$this->query->params = array($params);
						
				}
				else
				{
					
					foreach($params as $key => $value)
					{
						
						$this->query->sql = "OR ? ";
						$this->query->params = array($key, $value);

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

		
		return $this->query;
      
    }

      
}