<?php

defined('YII_APP_END') or define('YII_APP_END', 'back');
$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'name' => 'My Backend',
    'defaultRoute' => 'site',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@backend/views' => '@metronic/themes/admin/admin4/fluid/views'
                ],
                'baseUrl' => '@metronic/themes/admin/admin4/fluid/resources/',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => false,
                'yii\web\YiiAsset' => [
                    'depends' => [
                        'metronic\assets\jquery\JqueryAsset'
                    ]
                ]
            ],
        ],
    ],
    'params' => $params,
];
