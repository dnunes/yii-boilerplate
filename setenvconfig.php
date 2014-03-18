<?php

$DS = DIRECTORY_SEPARATOR;
$curPath = realpath(dirname(__FILE__)) . $DS;

$_CONFIG = array();
$_CONFIG['productionHost'] = 'site.com.br'; //NO WWW!
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

$configs = glob($curPath .'_envconfigs/*.php');
foreach ($configs as $cfile) { $envname = pathinfo($cfile, PATHINFO_FILENAME);
	$curconf = require($cfile);
	if (!is_array($curconf)) { continue; }
	if ($curconf['condition'] == true) {
		return returnConfig($envname, $curconf['configs']);
	}
}
