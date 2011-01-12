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
class Crystal_Query_Sql 
{
    function __construct($method, $sql)
    {

    	$this->query->sql = $sql[0];
    	$this->query->type = 'sql';
		
    	return $this->query;
    }


}