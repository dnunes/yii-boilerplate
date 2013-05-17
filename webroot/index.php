<?php

$_CONFIG = Array(); $curPath = dirname(__FILE__) .'/';
$_CONFIG['productionHost'] = 'site.com'; //NO WWW!
$_CONFIG['webrootPath']    = $curPath;
$_CONFIG['homePath']       = $homePath = $curPath .'../';
$_CONFIG['protectedPath']  = $homePath .'_protected/';
$_CONFIG['runtimePath']    = $homePath .'_runtime/';
$_CONFIG['webrootURL']     = dirname($_SERVER['SCRIPT_NAME']) .'/';



// ### Base Env Config ### \\

// Valores Default:
$_CONFIG['db_h'] = 'localhost'; //db host
$_CONFIG['db_n'] = 'db'; //database name


//###
//### PRODUCTION Envs
//###

	//prod
if (
	$_SERVER['HTTP_HOST'] == $_CONFIG['productionHost'] ||
	$_SERVER['HTTP_HOST'] == 'www.'. $_CONFIG['productionHost']
) {
	$_CONFIG['db_u'] = 'user'; $_CONFIG['db_p'] = 'pass';

	//homolog
} elseif ($_SERVER['HTTP_HOST'] == 'homolog.'. $_CONFIG['productionHost']) {
	$_CONFIG['db_u'] = 'user'; $_CONFIG['db_p'] = 'pass';


} else {
//###
//### DEVELOPMENT Envs
//###

	//Activate debug.
	define('YII_DEBUG', true);

	//dnunes
	if (false) { } elseif (
		$_SERVER['HTTP_HOST'] == 'site.dlocal' ||
		$_SERVER['HTTP_HOST'] == 'localhost.dlocal'
	) {
		$_CONFIG['db_u'] = 'user'; $_CONFIG['db_p'] = 'pass';

	//erro
	} else {
		die('Não há configuração para o ambiente atual. Por favor atualize o config.');
	}
}

$yii=dirname(__FILE__).'/../_yiif/yii.php';
$config=dirname(__FILE__).'/../_protected/config/main.php';

require_once($yii);
Yii::createWebApplication($config)->run();
