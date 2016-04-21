<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'params' => $params,
//必然启动组件名
    'bootstrap' => ['log'],
//下面的都是第一次访问实例化，无访问，不实例化
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VzMmz2tBZjj2JiDaSHev8sXGn9VhT4O5',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
//        'catchAll' => [ 所有请求都到这里
//            'site/index',
//            'param1' => 'value1',
//            'param2' => 'value2',
//        ],
//    'on beforeAction' => function ($event) {
//        echo '123123123123123';
//    },
//    'on afterAction' => function ($event) {
//        echo '11111111111111';
//    },
//    强制上述的控制器ID和类名对应， 通常用在使用第三方不能掌控类名的控制器上。
//    'controllerMap' => [
//        'account' => 'app\controllers\SiteController',
//    ],
//默认路由
//    'defaultRoute' => 'site',
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
        'allowedIPs' => ['*.*.*.*'] // 按需调整这里
    ];
}

return $config;
