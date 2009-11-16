<?php
header('Content-Type: text/html; charset=utf-8');
require('Crystal.php');

$db = Crystal::db();

//$result = $db->get('martin1')->fetch_all();

//print_r($result);


$data = array
			(
			'friend_email' => '192.168.0.s1',
			'password' => 'h'
			);
			
			
			
			$rules = array
			(
			'friend_email' => array('rule' => 'valid_ip'),
			'password' => array('rule' => array('between','6', '15'))
			);
			

		$validation = Crystal::validation($rules, $data);
		
		if($validation->passed == TRUE)
		{
			
		}
		else
		{
			print_r($validation->errors);
		}
		
