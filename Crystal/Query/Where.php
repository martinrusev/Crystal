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


    function __construct($method=null, $params = null)
    {
		
		$first_element = key($params);
		$last_element = end($params);
		
		switch ($method) 
		{
			case 'where':
				$this->query->type  = 'where';
				
				/** WORKS WITH STRING PARAMETER 
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
		
							$this->query->sql = "WHERE ? = ? ";
							
							
							/** ALTERNATIVE WHERE SYNTAX where('product_id, 1);
							 * 
							 */
							if(isset($parsed_columns['colon']) && $parsed_columns['colon'] == False)
							{
								$this->query->params = $params;
							}
							else
							{
								
								$sliced_params = array_slice($params, 1);
								
								
								
								
								// REPEAT AND 
								$total_params = count($sliced_params)-1 ; // substract the WHERE part
								
								/* only one parameter */
								if($total_params == 0)
								{
									$this->query->params = array($parsed_columns['column'], $params[1]);
								}
								else
								{
									
									$this->query->sql .= str_repeat("AND ? = ?", $total_params);
									
									
									foreach($parsed_columns as $key => $value)
									{
										
										$this->query->params[] = array($value['column'], $sliced_params[$key]);
									}
									
								}
			
								
							}	
							
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
				throw new Crystal_Query_Exception("Invalid method: " . $method);
			break;
		}

		
		return $this->query;
      
    }

      
}