<?php
return array(
	'condition' =>
		defined('CLI_RUN') &&
		$curPath == 'C:\\dnunes\\code\\'
	,
	'configs' => array('debug' => true,
		'db_h' => '192.168.68.7', 'db_n' => 'cliname',
		'db_u' => 'cliuser', 'db_p' => 'clipassword'
	)
);
