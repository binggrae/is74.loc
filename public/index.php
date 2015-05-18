<?php

$autoload = dirname(__FILE__) . '/../vendor/autoload.php';
$config   = dirname(__FILE__) . '/../protected/config/main.php';
$yii      = dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php';

require_once($yii);
require_once($autoload);

Yii::createWebApplication($config)->run();