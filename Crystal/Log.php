<?php
/**
 * MicroORM
 *
 * An open source application for database manipulation
 *
 * @package		Crystal ORM
 * @author		Martin Rusev
 * @link		http://crystal.martinrusev.net
 * @since		Version 0.1
 * @version     0.1
 */

// ------------------------------------------------------------------------

class Crystal_Log
{

    static public function write_query($query)
    {

        $development_log = LOG . 'development.txt';


        if(is_writable($development_log))
        {
            $current = file_get_contents($development_log);


            $current .= "[" .  date('D, d M Y H:i:s') ."] ";

            $current .= "Query executed:\n";

            // Append database query to the file
            $current .= $query . "\n";

         
            file_put_contents($development_log, $current);

        }
        else
        {
            echo "File not writable";
        }
        
        
    }

    
}