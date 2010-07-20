<?php
header('Content-Type: text/html; charset=utf-8');
require('Crystal.php');


$config_first = array(
				'username' => 'postgres',
				'password'=> '',
				'database' => 'crystal',
				'driver' => 'postgres'
				);

				
$config_second = array(
				'username' => 'postgres',
				'password'=> '',
				'database' => 'bugradar',
				'driver' => 'postgres'
				);	

$config_mysql = array(
				'username' => 'root',
				'password'=> '',
				'database' => 'active_record',
				'driver' => 'mysql',
				'hostname' => '127.0.0.1'
				);				

//$db = Crystal::db($config_mysql);






/*
$multiple_rules = array
(
	'email' => array('rules : valid_email 
					 | min_length : 5, message : Minimum length 5 symbols 
					 | max_length : 10, message : Maximum lenght 10 symbols 
					 | required'),

	
);

*/
	//'username' => array('rule : valid_email, message : Enter valid email address'),
	//'username' => array('rule : unique, table : users, field: user_name')

				

				$db  = Crystal::db($config_mysql);



$comment = '<table class="infobox" cellspacing="5" style="width:22em; text-align:left; font-size:88%; line-height:1.5em;">
<caption class="" style="font-size:125%; font-weight:bold;">HTML<br />
<span style="font-size:smaller; line-height:130%"><span style="white-space:nowrap;">(HyperText Markup Language)</span></span></caption>
<tr class="">
<th style="text-align:left;"><a href="/wiki/Filename_extension" title="Filename extension">Filename extension</a></th>
<td class="" style=""><code>.html, .htm</code></td>
</tr>
</tr>
<tr class="">
<th style="text-align:left;"><a href="/wiki/International_standard" title="International standard">Standard(s)</a></th>
<td class="" style="">ISO/IEC 15445<br />
<a href="http://www.w3.org/TR/1999/REC-html401-19991224/" class="external text" rel="nofollow">W3C HTML 4.01</a><br />
<a href="http://dev.w3.org/html5/spec/" class="external text" rel="nofollow">W3C HTML 5</a> (draft)</td>
</tr>
</table>
';

$data = array('comment' => $comment, 'post_id' => 1);
$db->insert('comments', $data)->execute(); 

/*
$data = array
(
'email' => 'ajax@zoho.com',
'password' => 'martin',
'empty' => 'test',
'alpha' => 'test',
'alpha_num' => 'test',
'comparsion' => '16', 
'extension' => 'file.ai',
'valid_ip' => '192.168.2.255',
'matches' => 'test',
'max_length' => 'te',
'min_length' => 'te',
'numeric' => '1s2',
'regexp' => 'user_name12'
);				
				
$rules = array(
				'regexp' => array('regexp: (/^[a-z\d_]{5,20}$/i) | required'),
				
				'numeric' => array('numeric | required'),
				'min_length' => array('min_length: (3) | required'),
				'max_length' => array('max_length: (3) | required'),
				'matches' => array('matches:(tst) | required'),
				'valid_ip' => array('valid_ip | required'),
				'extension' => array('extension:(jpg png gif psd ai) | required'),
				'comparsion' => array('comparsion:(= 16) | required'),
				'alpha' => array('alpha | required'),
				'alpha_num' => array('alpha_numeric'),
				'empty' => array('required'),
				'password' => array('between:(6 8)'),
				'email' => array('valid_email, message: test | unique , table: users,  message : This email is already taken'),
				
			  );

*/
//$validation = Crystal::validation($rules, $data, $postgre);

/*
if($validation->passed == TRUE)
{
   // echo "No errors";
}
else 
{
    //print_r($validation->errors);
}
*/
//$data = array('username' => 'martinius', 'email' => 'test@test.com');


//$postgre->insert('users', $data)->execute();
//$result = $postgre->last_insert_id();
//print_r($result);

//$postgre->sql('select *sd from users')->limit('10','10')->print_as_table();
//$postgre->get('users')->limit('0','1')->print_as_table();
//print_r($postgre->last_insert_id());

//$slave  = Crystal::db($config_second);
//$mysql = Crystal::db($config_mysql);

//$data = array('content' => 'My blog posting', 'title' => 'Blog title');
//$result = $mysql->get('entries')->fetch_all();

//print_r($result);

//$mysql->get('entries')->print_as_table();
//var_dump($master);
//var_dump($slave);

/*
$data = array('content' => 'testing content', 'title' => 'Testing title');

//$master->insert('entries', $data)->execute();

$result = $master->get('entries')->fetch_all();

foreach($result as $key => $value)
{
	$data = array('content' => $value['content'], 'title' => $value['title']);
	$slave->insert('posts', $data)->execute();
}
$slave->get('posts')->print_as_table();

*/


//$result = $master->get('test_table')->print_as_table();
//print_r($result);
//$slave->get('bugradar_bugs')->print_as_table();

