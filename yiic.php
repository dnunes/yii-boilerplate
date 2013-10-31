<?php

define('CLI_RUN', true);
$ok = require('envconfig.php');
if ($ok !== true) { die('Undefined environment. Please set the correct conditions on "envconfig.php" file.'); }

// fix for fcgi
defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

$yii = $_CONFIG['yiiPath'] .'yii.php';
$config = $_CONFIG['protectedPath'] .'config'. DIRECTORY_SEPARATOR .'main.php';

require_once($yii);
$app=Yii::createConsoleApplication($config);
$app->run();
