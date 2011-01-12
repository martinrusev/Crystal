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
class Crystal_Query_Get
{

    

    function __construct($method, $table)
    {
		
		$this->query->sql = "SELECT * FROM ? ";
		$this->query->type = 'get';
		$this->query->params = $table[0];

		return $this->query;
    }

    
}