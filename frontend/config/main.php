<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
	'name'=>'ELI INDEX',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'modules' => [
		'user' => [
			'class' => 'dektrium\user\Module',
			'controllerMap' => [
				'registration' => 'frontend\controllers\user\RegistrationController',
				'security' => 'frontend\controllers\user\SecurityController',
				'recovery' => 'frontend\controllers\user\RecoveryController'
			],
			'modelMap' => [
				'RegistrationForm' => 'frontend\models\user\RegistrationForm',
				'User' => 'frontend\models\user\User',
				'LoginForm' => 'frontend\models\user\LoginForm',
			],
			// uncomment if in production
			//'enableConfirmation' => true, 
			//'enableUnconfirmedLogin' => false,
			
			'enableConfirmation' => true,
			'enableUnconfirmedLogin' => false,
			'enableFlashMessages' => false,
			
		],
		
	],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
		
		'view' => [
			'theme' => [
				'pathMap' => [
					'@dektrium/user/views' => '@frontend/views/user'
				],
			],
		],
        /* 'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ], */
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
	
	/* 'modules' => [
        'supplier' => [
            'class' => 'frontend\modules\supplier\Module',
        ],
		'catalog' => [
            'class' => 'frontend\modules\catalog\Module',
        ],
		'client' => [
            'class' => 'frontend\modules\client\Module',
        ],
    ], */
	
	
    'params' => $params,
];
