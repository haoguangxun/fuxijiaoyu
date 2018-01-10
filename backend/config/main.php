<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'name' => '管理后台',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\modules\admin\models\User',
            'loginUrl' => ['admin/user/login'],
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],*/
        'authManager' => [
            'class' => 'backend\modules\admin\components\DbManager',
            'defaultRoles' => [ //必须登录
                'guest' => [
                    '/public/*',
                ]
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'backend\modules\admin\Module',
            //'layout' => 'main_new', // defaults to null, using the application's layout without the menu
            'mainLayout' => '@backend/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'backend\modules\admin\controllers\AssignmentController',
                ]
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grant Access' // change label
                ],
                //'route' => null, // disable menu
            ],
        ],
        'content' => [
            'class' => 'backend\modules\content\Module',
        ],
        'member' => [
            'class' => 'backend\modules\member\Module',
        ],
        'order' => [
            'class' => 'backend\modules\order\Module',
        ],
        'feedback' => [
            'class' => 'backend\modules\feedback\Module',
        ],
        'enroll' => [
            'class' => 'backend\modules\enroll\Module',
        ],
        'ad' => [
            'class' => 'backend\modules\ad\Module',
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/uploads',  //上传目录
            'uploadUrl' => '@web/uploads', //图片可访问地址
            'imageAllowExtensions'=>['jpg','png','gif'],
            'fileAllowExtensions'=>['txt','doc','docx','xls','xlsx','ppt','pptx','zip','rar'],
        ],

    ],
    'defaultRoute' => 'admin',
    'params' => $params,
];
