<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
    'sourceLanguage' => 'en',
    'language'=>LANGUAGE,

    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/yiistrap'), // change this if necessary
    ),

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'bootstrap.helpers.TbHtml',
        'application.modules.user.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array('bootstrap.gii'),
		),

        'user'=>array(
            'hash' => 'md5',
            'sendActivationMail' => true,
            'loginNotActiv' => false,
            'activeAfterRegister' => false,
            'autoLogin' => true,
            'registrationUrl' => array('/user/registration'),
            'recoveryUrl' => array('/user/recovery'),
            'loginUrl' => array('/user/login'),
            'returnUrl' => array('/user/profile'),
            'returnLogoutUrl' => array('/user/login'),
        ),
        'rights',
	),

	// application components
	'components'=>array(
		'user'=>array(
            // enable cookie-based authentication
            'class' => 'RWebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
		),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'defaultRoles' => array('Guest'),
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
        /*'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
        */
        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host='.DB_HOST.';dbname='.DB_NAME,
            'emulatePrepare' => true,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD,
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
        ),

        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'afanasev@comefoto.ru',
	),
);