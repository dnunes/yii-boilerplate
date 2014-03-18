<?php
return array(
	'condition' =>
		$_SERVER['HTTP_HOST'] == $_CONFIG['productionHost'] ||
		$_SERVER['HTTP_HOST'] == 'www.'. $_CONFIG['productionHost'] ||
		$_SERVER['HTTP_HOST'] == 'beta.'. $_CONFIG['productionHost']
	,
	'configs' => array(
		'cookieFreeDomain' => 'static.site.com.br',
		'db_h' => '127.0.0.1', 'db_n' => 'name',
		'db_u' => 'user', 'db_p' => 'password'
	)
);
