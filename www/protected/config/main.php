<?php

//var_dump($_SERVER['SERVER_NAME']);die;
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'homeUrl'=>array('site/login'),
	'name'=>'PHP07 DEMO WEB',
    'defaultController' => 'user',
//    'theme' => $theme,
	// preloading 'log' component
	'preload'=>array('log'),
    // doi language mac dinh cua Yii
    'language' => 'vi',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.PHPMailer.*',
	),

    'modules' => array( // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
//            'generatorPaths' => array(
//                'bootstrap.gii',
//            ),
        ),
        'admin' => array(
            'defaultController' => 'app',
        ),
        'shop' => array(
            // Controller mac dinh cua module shop
            'defaultController' => 'products',
            'debug' => 'true'
        ),
    ),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
//            'class' => 'WebUser'
		),
        'excel'=>array(
            'class'=>'application.extensions.phpexcel',
        ),
        'syntaxhighlighter' => array(
            'class' => 'application.extensions.JMSyntaxHighlighter.JMSyntaxHighlighter',
//            'class' => 'ext.JMSyntaxHighlighter.JMSyntaxHighlighter',
            'theme' => 'Default',
            /**
             * You can choose from the following themes:
            Default (the default if none provided)
            Django
            Eclipse
            Emacs
            FadeToGrey
            MDUltra
            Midnight
            RDark
             */
        ),
		// uncomment the following to enable URLs in path-format
//
//		'urlManager'=>array(
//			'urlFormat'=>'path',
////            'urlSuffix' => '.html',
//            'showScriptName' => false,
//			'rules'=>array(
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//			),
//		),

//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=webshop',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'error/error',
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
		'adminEmail'=>'hason61vn@gmail.com',
	),
//    'controllerMap' => array(
//        'sitemap' => array(
//            'class' => 'ext.sitemapgenerator.SGController',
//            'force_include' => true,
//            'cache' => array('cache', 86400, null),
//            'config' => array(
//                'sitemap.xml' => array(
//                    'index' => true
//                ),
//                'sitemap-category.xml' => array(
//                    'aliases' => array(
//                        'application.components.Sitemap.Categories'
//                    ),
//                ),
//                'sitemap-ungdung.xml' => array(
//                    'aliases' => array(
//                        'application.components.Sitemap.Applications'
//                    ),
//                ),
//                'sitemap-game.xml' => array(
//                    'aliases' => array(
//                        'application.components.Sitemap.Games'
//                    ),
//                ),
//            ),
//        ),
//    )
);