<?php
use yii\base\ActionEvent;
use yii;
$params = require (__DIR__ . '/params.php');

$config = array (
	// 区分当前应用和其他应用的唯一标示,这里必须配置
	'id' => 'basic',
	'basePath' => dirname ( __DIR__ ),
	'bootstrap' => array (
		'log' 
	),
	// 设定默认控制器
	'defaultRoute' => 'index',
	'components' => array (
		'request' => array (
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'Hg9JQz8ZsypG81g5PmTaAG45x5_b1JIt' 
		),
		'cache' => array (
			'class' => 'yii\caching\FileCache' 
		),
		'errorHandler' => array (
			'errorAction' => 'common/error' 
		),
		'mailer' => array (
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true 
		),
		'log' => array (
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => array (
				array (
					'class' => 'yii\log\FileTarget',
					'levels' => array (
							'error',
							'warning' 
					) 
				) 
			) 
		),
		'db' => array (
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=127.0.0.1;dbname=boytempt',
			'username' => 'root',
			'password' => '398062080',
			'charset' => 'utf8' 
		) 
	),
	'params' => $params,
	'on beforeAction' => function ($event) {
		$controllerName = $event->action->controller->id;
		$actionName = $event->action->id;
		$isValid = false;
		if (isset(Yii::$app->params['no_login'][$controllerName])) {
			if (in_array($actionName, Yii::$app->params['no_login'][$controllerName])) {
				$isValid = true;
			}
		}
		if (!$isValid) {
			$event->isValid = false;
			Yii::$app->response->redirect(Yii::$app->urlManager->createUrl(array('/user/login')));
		}
	}
);

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config ['bootstrap'] [] = 'debug';
	$config ['modules'] ['debug'] = array (
		'class' => 'yii\debug\Module' 
	);
	
	$config ['bootstrap'] [] = 'gii';
	$config ['modules'] ['gii'] = array (
		'class' => 'yii\gii\Module' 
	);
}

return $config;
