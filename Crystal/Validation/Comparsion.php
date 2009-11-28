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
class Crystal_Validation_Comparsion
{

	public $result;
	
	/**
	 * 
	 * @param $value numeric
	 * @param $comparsion_options array
	 * @return string/boolean
	 */
    function __construct($value=null, $comparsion_options=null)
    {
		
		/** CHECKS FOR $comparsion_options format
		 *   [0] => [0] => '>', [1] => 'number'
		 *   or [0] => '>', [1] => 'number'
		 *   
		 **/
        $comparsion = (is_array($comparsion_options[0]))?$comparsion_options[0]:$comparsion_options;
	
	
        switch ($comparsion[0])
        {
            case '>=':
            if($value >= $comparsion[1])
            {
                $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;

            case '<=':
            if($value <= $comparsion[1])
            {
                $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;


            case '>':
            if($value > $comparsion[1])
            {
                 $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;



            case '<':
            if($value < $comparsion[1])
            {
                 $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;
			
			
			case '=':
            if($value == $comparsion[1])
            {
                 $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;


            default:
            break;
        }

    }
	
	function __toString()
	{
		return $this->result;
	}

}
/* END OF FILE **/