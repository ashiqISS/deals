<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$user = dirname(dirname(__FILE__));
Yii::setPathOfAlias('user', $user);
return array(
    'basePath' => dirname($user),
    'runtimePath' => $user . '/runtime',
    'controllerPath' => $user . '/controllers',
    'viewPath' => $user . '/views',
    'name' => 'NewGen Shop',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'user.components.*',
        'user.controllers.*',
        'user.views.*',
        'user.extensions.yii-mail.*',
        'user.extensions.yiinfinite-scroll.YiinfiniteScroller',
        'user.extensions.easyimage.EasyImage',
        'user.extensions.NavaJcrop.ImageJcrop',
    ),
    'modulePath' => $user . '/modules/',
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'registration', 'merchant', 'buyer',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'Upload' => array('class' => 'UploadFile'),
        'category' => array('class' => 'selectCategory'),
        'Currency' => array('class' => 'Converter'),
        'Discount' => array('class' => 'DiscountPrice'),
        'Menu' => array('class' => 'MenuCategory'),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'clientScript' => array(
            'class' => 'CClientScript',
            'scriptMap' => array(
                'jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
                'jquery.min.js' => '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
                'jquery-ui.js' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js',
                'jquery-ui.min.js' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js'
            ),
        ),
        'mail' => array(
            'class' => 'application.user.extensions.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
//                'host' => 'mail.ecareagora.com',
                'host' => 'mail.intersmarthosting.in',
                // 'encryption'=>'ssl', // use ssl
                'username' => "develop@intersmarthosting.in",
                'password' => "develop@123",
                'port' => '25', // ssl port for gmail
            ),
            'viewPath' => 'application.user.template',
            'logging' => true,
            'dryRun' => false
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => require(dirname(__FILE__) . '/urlrules.php'),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
//        'db' => array(
//            'connectionString' => 'mysql:host=localhost;dbname=vijaymasala',
//            'emulatePrepare' => true,
//            'username' => 'root',
//            'password' => 'mysql',
//            'charset' => 'utf8',
//        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);

