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
class Crystal_Query_Mysql_Query 
{

   private $query;
   private $print_sql;
   protected $exceptions; 


    function  __construct($active_connection = null)
    {
        $this->conn = new Crystal_Connection_Manager($active_connection);
             
        $this->helper = new Crystal_Helper_Mysql($this->conn);
       
    }


	/** USED FOR GENERATING QUERY **/
    function  __call($name,  $arguments)
    {
    	
		$constant = "Crystal_Query_Mysql_";
		
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
		'order_by' => 'orderby'
		);
       
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
			
			$this->sql  .= new $rescue_method($name,  $filtered_arguments, $this->helper);	
		}
		elseif(class_exists($default_method))
		{	
			$this->sql  .= new $default_method($name, $filtered_arguments , $this->helper);	
		}
        else
        {	
			throw new Crystal_Query_Mysql_Exception('Invalid or not existing method' . $name);		
        }
		
							
			/**  CRUCIAL FOR METHOD CHAIN **/
			return $this;
     	
        
    }


    public function execute($delete_sql = null)
	{
		$this->query = mysql_query($this->sql);		

		if (!$this->query)
		{
			throw new Crystal_Query_Mysql_Exception("Mysql Error:" . mysql_error());
			return;
		}
		else
		{
			if($delete_sql == false)
			{
				$this->sql = NULL;
			}
			
			return $this->query;
		}
		
    }


    function fetch_all()
	{

        $this->execute();

	 	 while($row = mysql_fetch_assoc($this->query))
         {
         	
			$result[] = Crystal_Helper_Mysql::clean_db_result($row);
         	
         }

		/** RESET SQL **/
		$this->sql = NULL;
		
		if(isset($result))
		{
			return $result;
		}
		else
		{
			return FALSE;
		}	
        

    }


    function fetch_row()
	{

        $this->execute();
		
		
		$row =  mysql_fetch_assoc($this->query);
		
		if(isset($row) && !empty($row))
		{
			$clean_row[] = Crystal_Helper_Mysql::clean_db_result($row);
		}

		/** RESET SQL **/
		$this->sql = NULL;
		
		if(isset($clean_row))
		{
			return $clean_row[0];
		}
		else
		{
			return FALSE;
		}	
    }
	
	function fetch_object()
	{

        $this->execute();
		
		
		$result = mysql_fetch_object($this->query);
		
		/** RESET SQL **/
		$this->sql = NULL;

       if(isset($result))
		{
			
			return $result;
		}
		else
		{
			return FALSE;
		}	
    }


    function fetch_element($element)
	{

		
       $this->execute();
	   
	
       if(is_string($element))
       {
		
          $query = mysql_fetch_assoc($this->query);
		 
		  if(isset($query[$element]))
		  {	
			
			/** RESET SQL **/
			$this->sql = NULL;
		  	return $query[$element];
		  
		  }	
		  else
		  {
		  	throw new Crystal_Query_Mysql_Exception("Element:" . $element . "can't be found");
         
		  }
		  

        }
        else
        {
           throw new Crystal_Query_Mysql_Exception("<b>fetch_element()</b> works only with strings as parameter");
           
        }


    }
	
	
	function last_insert_id()
	{

		return mysql_insert_id();

	}


	function affected_rows()
	{
		return mysql_affected_rows();
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
		
		$this->execute('true');
		
		
		while($row = mysql_fetch_assoc($this->query))
		{
         	
			$result[] = Crystal_Helper_Mysql::clean_db_result($row);
         	
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
            
            throw new Crystal_Query_Mysql_Exception("No valid sql to print");
        }
        else
        {
             print_r('</br>'. $this->sql);

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
    
    /** INTERNAL FUNCTION  * */
    function get_memory_usage($param = null)
    {
    	$memory_usage = memory_get_usage();
    	
    	echo "<br/>";
    	
    	if($param == null)
    	{
    		echo "Crystal memory usage: "  . $memory_usage . " bytes"; 
    	}
    	else if($param == 'kb')
    	{
			echo "Crystal memory usage: "  . round($memory_usage/1024,2)." kilobytes"; 
    	}
    	else if($param == 'mb')
    	{
		 
    		echo "Crystal memory usage: "  . round($memory_usage/1048576,2) . " megabytes";
    	
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
/** END OF THE FILE **/