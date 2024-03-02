<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'uz-UZ',
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'uz',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'js'=>[]
//                ],
//                'yii\bootstrap\BootstrapAsset' => [
//                    'css' => []
//                ]
            ]
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'frontend\components\LangRequest'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class'=>'frontend\components\LangUrlManager',
            'rules' => [
                '' => 'site/index',
                'chs/<param:\w+>'   => 'site/check-sms',
                't/<id:\w+>'   => 'site/d-tracking',
                's/<q:\w+>'   => 'site/search',
                'e/<id:\w+>'  => 'site/receipt',
                'o/<c:\w+>'   => 'site/office-find-by-code',
                'nashi-ofisi' => 'site/office',
                'dokumenty'   => 'site/privancy',
                'app/ios).'   => 'app/ios',
                // uz
                '<id:express-pochta>' => 'site/service',
                '<id:kompleks-logistika>' => 'site/service',
                '<id:kuryer-xizmati>' => 'site/service',
                '<id:xalqaro-yetkazish>' => 'site/service',
                '<id:sklad-xizmati>' => 'site/service',
                '<id:e-commerce>' => 'site/service',
                '<id:individual-yuk-tashish>' => 'site/service',

                // ru
                '<id:ekspres-pochta>' => 'site/service',
                '<id:kompleksnaya-logistika>' => 'site/service',
                '<id:kuryerskaya-slujba>' => 'site/service',
                '<id:skladskie-uslugi>' => 'site/service',
                '<id:ecommerskaya>' => 'site/service',
                '<id:mejdunarodnaya_dostavka>' => 'site/service',
                '<id:individualnaya_perevozka_gruzov>' => 'site/service',

                '<action>' => 'site/<action>',
            ],
        ],
        'btsUser' => [
            'class' => 'frontend\components\BtsUser'
        ],
    ],
    'params' => $params,
];
