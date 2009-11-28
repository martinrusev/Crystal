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
class Crystal_Query_Mysql_Select 
{

    

    function __construct($method=null,  $columns=null)
    {


               
		$this->select = "SELECT";
		


          if(is_array($columns))
          {
			
					
	          $last_column =  end($columns);
			  /** WORKS FOR CUSTOM SELECT: select('products, MIN(price)') **/
			  if(isset($columns[1]) && $columns[1] == FALSE)
			  { 
			  	   $this->select .= ' '.  $columns[0]. ' ';
			  }
			  else
			  {
			  	
					foreach($columns as $value)
		            {
						if($value != $last_column)
						{
							$this->select .= Crystal_Helper_Mysql::add_apostrophe($value) . ", ";
						}
						else
						{
							$this->select .= Crystal_Helper_Mysql::add_apostrophe($value);
						}
		
		            }
				
			  }
			  
	           



          }
         elseif(is_string($columns))
         {
                 
              $this->select .= Crystal_Helper_Mysql::add_apostrophe($columns);
         }
         else
         {
              $this->select = FALSE;
         }
		
		
      
    }

    public function __toString() 
    {
        return $this->select;
    
    }
    
    
}