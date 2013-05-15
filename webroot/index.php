<?php

$yii=dirname(__FILE__).'/../_yiif/yii.php';
$config=dirname(__FILE__).'/../_protected/config/main.php';


global $_CONFIG; $_CONFIG = Array(); $curPath = dirname(__FILE__) .'/';
$_CONFIG['webrootPath']   = $curPath;
$_CONFIG['homePath']      = $homePath = $curPath .'../';
$_CONFIG['protectedPath'] = $homePath .'_protected/';
$_CONFIG['runtimePath']   = $homePath .'_runtime/';
$_CONFIG['webrootURL']    = dirname($_SERVER['SCRIPT_NAME']) .'/';



// ### Configurações Básicas de Ambiente ### \\

// Valores Default:
$_CONFIG['db_h'] = 'localhost'; //db host
$_CONFIG['db_n'] = 'db'; //database name


//###
//### Ambientes PROD
//###

	//produção
if (
	$_SERVER['HTTP_HOST'] == 'site.com.br' ||
	$_SERVER['HTTP_HOST'] == 'www.site.com.br'
) {
	$_CONFIG['db_u'] = 'user'; $_CONFIG['db_p'] = 'pass';

	//homologação
} elseif ($_SERVER['HTTP_HOST'] == 'homolog.site.com.br') {
	$_CONFIG['db_u'] = 'user'; $_CONFIG['db_p'] = 'pass';


} else {
//###
//### Ambientes DEV
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

require_once($yii);
Yii::createWebApplication($config)->run();
