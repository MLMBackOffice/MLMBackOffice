<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
     'language'=>'es', // spanish
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',
        function () {
            return Yii::$app->getModule("user");
        },
    // to set up /user routes
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mWIP_mlwBvrslf0cfKG6kiVqgnl6T5X4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
         //   'class' => 'amnah\yii2\user\components\User',
            'class' => 'app\modules\user\components\User',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'ivanssalazar14@gmail.com',
                'password' => 'ivansalazar14',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig' => [
                'from' => ['ivanssalazar14@gmail.com' => 'ivansalazar'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    //            '<controller:\w+>/<action:\w+>/<patrocinador:\w+>' => '<controller>/<action>/<patrocinador>',
            ),
        ],
         'i18n' => [
            'translations' => [
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                //    'basePath' => '@app/messages/es/user.php', // example: @app/messages/fr/user.php
                ]
            ],
        ],
        'db' => require(__DIR__ . '/db.php')
    ],
    'modules' => [
        'user' => [
            'class' => 'app\modules\user\Module',
        // set custom module properties here ...
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*    'mailer' => [
          'class' => 'yii\swiftmailer\Mailer',
          // send all mails to a file by default. You have to set
          // 'useFileTransport' to false and configure a transport
          // for the mailer to send real emails.
          'useFileTransport' => true,
          ],
         */
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
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
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
