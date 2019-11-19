<?php

return [
	'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',        
    'components' => [
		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=smeii_eli',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
		'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'formatter' => [
			'dateFormat' => 'php:d M Y',
			'datetimeFormat' => 'php:D d M Y h:i a',
			'decimalSeparator' => '.',
			'thousandSeparator' => ', ',
			'currencyCode' => 'RM',
		],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'rules' => [
            //],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            'transport' => [
                 'class' => 'Swift_SmtpTransport',
                 'host' => 'smtp.gmail.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                 'username' => '',
                 'password' => '',
                 'port' => '465', // Port 25 is a very common port too
                 'encryption' => 'ssl', // It is often used, check your provider or mail server specs
             ],
        ],
		
    ],
];
