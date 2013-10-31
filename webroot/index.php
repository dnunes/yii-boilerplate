<?php

$ok = require('../envconfig.php');
if ($ok !== true) { die('Undefined environment. Please set the correct conditions on "envconfig.php" file.'); }

$yii = $_CONFIG['yiiPath'] .'yii.php';
$config = $_CONFIG['protectedPath'] .'config'. DIRECTORY_SEPARATOR .'main.php';

require_once($yii);
Yii::createWebApplication($config)->run();
