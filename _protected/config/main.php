<?php

global $_CONFIG;
$debug = defined('YII_DEBUG') && YII_DEBUG;

//general config (for web and CLI)
$r = array(
	'basePath' => $_CONFIG['protectedPath'],
	'runtimePath' => $_CONFIG['runtimePath'],

	'name' => 'Yii Base Project',

	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*'
	),

	// application components
	'components' => array(
		'cache'=>array('class'=>'CDbCache'),

		'db' => array(
			'class' => 'system.db.CDbConnection',
			'connectionString' =>
				'mysql:host='. $_CONFIG['db_h'] .';'.
				'dbname='. $_CONFIG['db_n'],
			'username' => $_CONFIG['db_u'],
			'password' => $_CONFIG['db_p'],
			'charset' => 'utf8',
			'schemaCachingDuration' => 3600,
			'enableProfiling' => $debug,
			'enableParamLogging' => $debug
		),

		'urlManager' => array(
			'urlFormat' => 'path', 'showScriptName' => false,
			'rules' => require('routes.php')
		),
		//'errorHandler' => array('errorAction' => 'main/erro'),

		'log' => array('class' => 'CLogRouter', 'routes' => array(
			array(
				'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
				'enabled' => $debug
			),
			array(
				'class' => 'CFileLogRoute',
				'enabled' => false,
				'levels' => 'trace, info, error, warning'
			)
		))
	)
);
if (!defined('CLI_RUN')) { //web only
	$r['defaultController'] = 'site';
	$r['components']['assetManager'] = array(
		'basePath' => $_CONFIG['webrootPath'] .'_assets',
		'baseUrl' => $_CONFIG['webrootURL'] .'_assets'
	);

} else { //command-line only

}

if ($debug) {
	$r['import'][] = 'application.extensions.yii-debug-toolbar.*';
} return $r;
