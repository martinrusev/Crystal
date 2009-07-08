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
class Crystal_Methods_Mysql_Query 
{

   private $query;
   private $print_sql;
   protected $exceptions; 


    function  __construct($active_connection = null)
    {

        $this->conn = new Crystal_Connection_Manager($active_connection);
		
		

    }


	/** USED FOR GENERATING QUERY **/
    function  __call($name,  $arguments)
    {
    	
		/** TODO - Rewrite it,  not the most elegant solution **/
		$constant = "Crystal_Methods_Mysql_";
		
		$exceptions = array
		(
		'left_join' => 'join',
		'right_join' => 'join',
		'minimum' => 'expression',
		'maximum' => 'expression',
		'average' => 'expression',
		'summary' => 'expression',
		'or' => 'where',
		'in' => 'where',
		'and' => 'where',
		'like' => 'where'
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
			
			$this->sql  .= new $rescue_method($name, $filtered_arguments);
				
			
		}
		elseif(class_exists($default_method))
		{
				
			
			$this->sql  .= new $default_method($name, $filtered_arguments);
				

			
		}
        else
        {
        	
			throw new Crystal_Methods_Mysql_Exception('Invalid or not existing method' . $name);	
			
        }
		
		
		
		
		
								
			/**  CRUCIAL FOR METHOD CHAIN **/
			
			return $this;
     	
        
    }


  

    public function execute()
	{
		
        $this->query = mysql_query($this->sql);


	    if (!$this->query)
		{
	            throw new Crystal_Methods_Mysql_Exception("Mysql Error:" . mysql_error());
	            return;
		}
		else
		{
			return $this->query;
		}


    }



    function fetch_all()
	{

        $this->execute();

	 	while($row = mysql_fetch_assoc($this->query))
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
		
		
		$result =  mysql_fetch_assoc($this->query);
		
		
		/** RESET SQL **/
		$this->sql = NULL;
		
        return $result;
    }
	
	function fetch_object()
	{

        $this->execute();
		
		
		$result = mysql_fetch_object($this->query);
		
		/** RESET SQL **/
		$this->sql = NULL;

        return $result;
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
		  	throw new Crystal_Methods_Mysql_Exception("Element:" . $element . "can't be found");
         
		  }
		  

        }
        else
        {
           throw new Crystal_Methods_Mysql_Exception("<b>fetch_element()</b> works only with strings as parameter");
           
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
    


    function last_insert_id()
	{

     return mysql_insert_id();

    }


    function affected_rows()
	{

        return mysql_affected_rows();
    }




}

