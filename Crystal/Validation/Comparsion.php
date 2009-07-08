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

    function __construct($value=null, $comparsion_options=null)
    {

        $comparsion = $comparsion_options[0];
	

        switch ($comparsion[0])
        {
            case '>=':
            if($value >= $comparsion_options[1])
            {
                $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;

            case '<=':
            if($value <= $comparsion_options[1])
            {
                $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;


            case '>':
            if($value > $comparsion_options[1])
            {
                 $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;



            case '<':
            if($value < $comparsion_options[1])
            {
                 $this->result =  TRUE;
            }
			else
			{
				$this->result = FALSE;
			}
            break;
			
			
			case '=':
            if($value == $comparsion_options[1])
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