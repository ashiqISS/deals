<?php

$admin = dirname(dirname(__FILE__));
Yii::setPathOfAlias('admin', $admin);
Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/yiibooster');
return array(
    // This path may be different. You can probably get it from `config/main.php`.
    'timeZone' => 'Asia/Calcutta',
    'basePath' => dirname($admin),
    'runtimePath' => $admin . '/runtime',
//    'controllerPath' => $admin . '/controllers',
//    'viewPath' => $admin . '/views',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Cron',
    'preload' => array('log', 'booster'),
    'import' => array(
        'application.models.*',
        'admin.models.*',
        'application.components.*',
        'admin.components.*',
        'admin.controllers.*',
        'admin.views.*',
        'admin.modules.*',
    ),
    // We'll log cron messages to the separate files
    'components' => array(
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'cron.log',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'cron_trace.log',
                    'levels' => 'trace',
                ),
            ),
        ),
        'modulePath' => $admin . '/modules/',
        'modules' => array(
            'settings', 'users', 'products', 'masters', 'Ad', 'reports', 'payouts',
            // uncomment the following to enable the Gii tool
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => 'gii',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters' => array('127.0.0.1', '::1'),
            ),
        ),
        // Your DB connection
        'db' => array(
        'connectionString' => 'mysql:host=localhost;dbname=isshosti_dealsonindia',
            'emulatePrepare' => true,
            'username' => 'isshosti_dealson',
            'password' => 'M$&;HS?c]M[!',
            'charset' => 'utf8',
        ),
    ),
);
