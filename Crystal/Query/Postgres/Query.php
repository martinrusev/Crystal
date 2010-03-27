<?php
/**
 * Crystal 
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.1
 * @version     0.4
 */

// ------------------------------------------------------------------------
class Crystal_Query_Postgres_Query 
{

   private $query;
   private $print_sql;
   protected $exceptions; 


    function  __construct($active_connection = null, $additional_config_params=null)
    {

        $this->conn = new Crystal_Connection_Manager($active_connection, $additional_config_params);	

    }


	/** USED FOR GENERATING QUERY **/
    function  __call($method,  $arguments)
    {
    	$this->method = (isset($method))?$method:'';
    	
		$constant = "Crystal_Query_Postgres_";
		
		$exceptions = array
		(
		'left_join' => 'join',
		'right_join' => 'join',
		'outer_join' => 'join',
		'inner_join' => 'join',
		'minimum' => 'expression',
		'maximum' => 'expression',
		'average' => 'expression',
		'summary' => 'expression',
		'or' => 'where',
		'in' => 'where',
		'and' => 'where',
		'like' => 'where',
		'order_by' => 'orderby',
		'group_by' => 'groupby'
		);
       
	    $default_method = $constant . ucfirst($this->method);
	    
			
		
		/** CHECKS FOR ARRAY **/		
		if(is_array($arguments[0]))
		{
			$filtered_arguments = $arguments[0];
		}
		else
		{
					
			$filtered_arguments = $arguments;
		}

		
		/** GETS TABLE NAME **/
		if($method == 'insert')
		{
			$this->table = $filtered_arguments[0];
		}
		
		
		
		
		if(array_key_exists($this->method, $exceptions))
		{
			
			$rescue_method = $constant . ucfirst($exceptions[$this->method]);
			
			$this->sql  .= new $rescue_method($this->method, $filtered_arguments);
				
			
		}
		elseif(class_exists($default_method))
		{
				
			
			$this->sql  .= new $default_method($this->method, $filtered_arguments);
				

			
		}
        else
        {
        	
			throw new Crystal_Query_Postgres_Exception('Invalid or not existing method' . $this->method);	
			
        }
		
			
			return $this;
     	
        
    }


  

    public function execute($keep_sql = null)
	{

		$connection_object = get_object_vars($this->conn);	
		
        $this->query =  pg_query($connection_object['conn']->db, $this->sql );
        
       
        /** GATHERS INFO FOR LAST INSERT ID **/
        if(isset($this->table))
        {
        	 $meta = pg_meta_data($connection_object['conn']->db, $this->table);	 
        	 reset($meta);
			 $id = key($meta); 
			 
			 $this->seq = $this->table . '_' . $id . '_seq';
        	 
        }
       
        
       	


	    if (!$this->query)
		{
	            throw new Crystal_Query_Postgres_Exception("Postgres syntax error: " . pg_last_error($connection_object['conn']->db));
	            return;
		}
		else
		{
			if($keep_sql == null)
			{
				$this->sql = NULL;
			}	
			
			return $this->query;
		}


    }



    function fetch_all()
	{

        $this->execute();

	 	while($row = pg_fetch_assoc($this->query))
         {
             $result[] = $row;
         }

		/** RESET SQL **/
		$this->sql = NULL;
			
        return $result;

    }


    function fetch_row()
	{

        $this->execute();
		
		
		$result =  pg_fetch_assoc($this->query);
		
		
		/** RESET SQL **/
		$this->sql = NULL;
		
        return $result;
    }
	
	function fetch_object()
	{

        $this->execute();
		
		
		$result = pg_fetch_object($this->query);
		
		/** RESET SQL **/
		$this->sql = NULL;

        return $result;
    }


    function fetch_element($element)
	{

		
       $this->execute();
	   
	
       if(is_string($element))
       {
		
          $query = pg_fetch_assoc($this->query);
		 
		  if(isset($query[$element]))
		  {	
			
			/** RESET SQL **/
			$this->sql = NULL;
		  	return $query[$element];
		  
		  }	
		  else
		  {
		  	throw new Crystal_Query_Postgres_Exception("Element:" . $element . "can't be found");
         
		  }
		  

        }
        else
        {
           throw new Crystal_Query_Postgres_Exception("<b>fetch_element()</b> works only with strings as parameter");
           
        }


    }
    
    function last_insert_id()
    {
    	if(isset($this->table))
    	{
    		
    		$connection_object = get_object_vars($this->conn);
		
    		$result = pg_query($connection_object['conn']->db, "SELECT CURRVAL('{$this->seq}') as seq_id");
    	
    		$id =  pg_fetch_assoc($result);
    	
    		return $id['seq_id'];
    		
    	}
    	else
    	{
    		throw new Crystal_Query_Postgres_Exception("last_insert_id workso only for INSERTS");
    	}
		

    }
    
	
    function affected_rows()
	{

        return pg_affected_rows();
    }
	
    
/******************************
*  
*  DEBUG FUNCTIONS 
*
*****************************/
	
	
    function clear_sql()
    {
    	
    	$this->sql = null;
    }
    
    function debug_fetch()
	{
		
		$this->execute($keep_sql=true);
		

	 	while($row = pg_fetch_assoc($this->query))
         {
             $result[] = $row;
         }

			
		if(isset($result))
		{
			return $result;
		}
		else
		{
			return FALSE;
		}		
		
		
	}
	
	
	function print_sql()
    {

        if($this->sql == FALSE)
        {
            
            throw new Crystal_Query_Postgres_Exception("No valid sql to print");
        }
        else
        {
             print_r('</br>'. $this->sql);
             
             $this->clear_sql();

             return $this;
        }

       


    }
    
	function query_time()
    {
    	list($usec, $sec) = explode(' ',microtime()); 
		$querytime_before = ((float)$usec + (float)$sec);
    	
		$this->debug_fetch();
		
		list($usec, $sec) = explode(' ',microtime()); 
		$querytime_after = ((float)$usec + (float)$sec); 
		 
		$this->query_time = $querytime_after - $querytime_before; 
		
    	if($this->query_time == TRUE)
    	{
    		
    		 $strQueryTime = ' Query took %01.4f sec'; 
    		 printf($strQueryTime, $this->query_time);

            return $this;	
    		
    	}
    }
   
    
    
    
    
	function print_as_table($debug = null)
    {
    	
    	if($debug == true)
    	{
    		$this->print_sql();
    		$this->query_time();
    		$result = $this->debug_fetch();
    	}
    	else
    	{
    		$result = $this->fetch_all();
    	}
    	
		if(isset($result[0]) && !empty($result[0]))
		{
			$table_fields = array_keys($result[0]);
			
		}
		
    	
		
		ob_start();
		include(CRYSTAL_BASE . CRYSTAL_DS . 'views' . CRYSTAL_DS . 'print_as_table.php');
		$rendered_template = ob_get_contents();
		ob_end_clean();
         
		echo $rendered_template;
    	
    	
    }




}

