<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'奥诚兴业',
	'language'=>'zh_cn',
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.widgets.*',
		'application.util.*',
		'application.util.editor.*',
	),
	'defaultController' => 'default',
	#'modules'=>array(
	#	'gii'=>array(
	#		'class'=>'system.gii.GiiModule',
	#		'password'=>'gii',
	#		'ipFilters'=>array('127.0.0.1','::1'),
	#	),
	#),

	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=aocheng',
			'emulatePrepare' => true,
			'username' => 'aocheng',
			'password' => 'aocheng',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				/*array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),
	),

	'params'=>array(
		'adminEmail'=>'bsspirit@gmail.com',
	),
);