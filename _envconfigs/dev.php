<?php
return array(
	'condition' =>
		$_SERVER['HTTP_HOST'] == 'macaca-chita' ||
		$_SERVER['HTTP_HOST'] == 'localhost.dlocal' ||
		$_SERVER['HTTP_HOST'] == '192.168.68.1' //from virtual host, maybe?
	,
	'configs' => array(
		'debug' => true,
		'db_h' => '192.168.68.7', 'db_n' => 'name',
		'db_u' => 'user', 'db_p' => 'password',
	)
);
