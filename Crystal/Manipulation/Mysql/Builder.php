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
class Crystal_Manipulation_Mysql_Builder 
{

   private $query;
   private $print_sql;
   protected $exceptions; 


    function  __construct($active_connection = null)
    {
		
        $this->active_connection = $active_connection;
    }


	/** USED FOR GENERATING QUERY **/
    function  __call($name,  $arguments)
    {
    	
		/** TODO - Rewrite it,  not the most elegant solution **/
		$constant = "Crystal_Manipulation_Mysql_";
		
		$exceptions = array(
							'create_database' => 'create',
							'create_table' => 'create',
							'drop_database' => 'drop'
							);
       	
		
		/** NEEDED FOR METHODS THAT MUST REPLACE %s in PREVIOUS METHODS **/
		$replacement_exceptions = array('with_fields' => 'fields');
				
	    $default_method = $constant . ucfirst($name);
		
	
		
		/** CHECKS FOR ARRAY **/		
		if(is_array($arguments[0]))
		{
			$filtered_arguments = $arguments[0];
		}
		else
		{
					
			$filtered_arguments = $arguments;
		}	
		
		
		
		if(array_key_exists($name, $exceptions))
		{
			
			$rescue_method = $constant . ucfirst($exceptions[$name]);
			
			$this->sql  .= new $rescue_method($name, $filtered_arguments);
				
			
		}
		elseif(array_key_exists($name, $replacement_exceptions))
		{
			
			$rescue_method = $constant . ucfirst($replacement_exceptions[$name]);
			
			$this->replacement  .= new $rescue_method($name, $filtered_arguments);
				
			
		}
		elseif(class_exists($default_method))
		{
				
			$this->sql  .= new $default_method($name, $filtered_arguments);
			
		}
        else
        {
        	
			throw new Crystal_Methods_Mysql_Exception('Invalid or not existing method' . $name);	
			
        }
		
		
		/** TIME FOR STRING REPLACEMENT **/
		if(isset($this->replacement))
		{
			$this->sql =  preg_replace('/%s/', $this->replacement, $this->sql);
		}
		
			
		
							
			/**  CRUCIAL FOR METHOD CHAIN **/
			
			return $this;
     	
        
    }
	
	public function in_database($database)
	{
		
		$this->database = array('database' => $database);
		
		return $this;
		
	}
	
	
	public function execute()
	{
		
		/** IN DATABASE Exception **/
		if(isset($this->database))
		{
			
			$this->conn = new Crystal_Connection_Manager($this->active_connection, $this->database);
			
		}
		else
		{
			
			$this->conn = new Crystal_Connection_Manager($this->active_connection);
		}
		
		
        $this->query = mysql_query($this->sql);
	
		

	    if (!$this->query)
		{
	            throw new Crystal_Exception("Mysql Error:" . mysql_error());
	            return;
		}
		else
		{
			$this->sql = NULL;
			return $this->query;
		}
		

    }
	
	
	
	function print_sql()
    {

        if($this->sql == FALSE)
        {
            
            throw new Crystal_Methods_Mysql_Exception("No valid sql to print");
        }
        else
        {
             $this->print_query =  print_r('</br>'. $this->sql);

             return $this->print_query;
        }

    }
	
}