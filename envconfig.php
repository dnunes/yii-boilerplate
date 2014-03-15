<?php

$DS = DIRECTORY_SEPARATOR;
$curPath = realpath(dirname(__FILE__)) . $DS;

$_CONFIG = Array();
$_CONFIG['productionHost'] = 'site.com'; //NO WWW!
$_CONFIG['homePath']       = $curPath;
$_CONFIG['yiiPath']        = $curPath .'_yiif'. $DS;
$_CONFIG['webrootPath']    = $curPath .'webroot'. $DS;
$_CONFIG['protectedPath']  = $curPath .'_protected'. $DS;
$_CONFIG['runtimePath']    = $curPath .'_runtime'. $DS;
if (!defined('CLI_RUN')) {
	$_CONFIG['webrootURL'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/.\\') .'/';
}



function returnConfig($envname, $opts) { global $_CONFIG;
	define('ENV_NAME', $envname); foreach ($opts as $k => $v) {
		if ($k == 'debug') { define('YII_DEBUG', $v); continue; }
		$_CONFIG[$k] = $v;
	} return true;
}



//###
//### Default values
//###
$_CONFIG['db_h'] = 'localhost'; //db host
$_CONFIG['db_n'] = 'db'; //database name
$_CONFIG['db_schemacache'] = 3600; //database schema caching ("0" to disable)





//###
//### Command-line Envs
//###
if (defined('CLI_RUN')) {



	if ($curPath == 'C:\\dnunes\\code\\') { //dev
		return returnConfig('dev', array(
			'db_u' => 'root', 'db_p' => ''
		));
	} else { //prod
		return returnConfig('prod', array(
			'db_u' => 'root', 'db_p' => 'pass'
		));
	}



//###
//### Web Envs
//###
} else {



	//prod
	if (
		$_SERVER['HTTP_HOST'] == $_CONFIG['productionHost'] ||
		$_SERVER['HTTP_HOST'] == 'www.'. $_CONFIG['productionHost']
	) {
		return returnConfig('prod', array(
			'db_u' => 'user', 'db_p' => 'pass'
		));

	//homolog (debug ON)
	} elseif ($_SERVER['HTTP_HOST'] == 'homolog.'. $_CONFIG['productionHost']) {
		return returnConfig('homolog', array(
			'debug' => true, 'db_u' => 'user', 'db_p' => 'pass'
		));

	//local-dev (debug ON);
	} elseif (
			$_SERVER['HTTP_HOST'] == 'site.dlocal' ||
			$_SERVER['HTTP_HOST'] == 'localhost.dlocal'
	) {
		return returnConfig('dev', array(
			'debug' => true, 'db_u' => 'user', 'db_p' => 'pass'
		));
	}



}
