<?php

namespace frontend\controllers;

use common\helper\SendMsg;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Session;

/**
 * Login controller
 */
class LoginController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * 登录
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if($model->login()){
                return [
                    'code' => 10000,
                    'url' => Yii::$app->getUser()->getReturnUrl()
                ];
            }else{
                return [
                    'code' => 10001,
                    'msg' => '手机号或密码错误'
                ];
            }
        } else {
            Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    /**
     * 快捷登录
     */
    public function actionQuickLogin()
    {
        $model = new LoginForm();
        $model->scenario = 'quickLogin';
        if ($post = Yii::$app->request->post()) {
            if ($model->load($post)) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $session = new Session();
                if ($post['verification'] != $session->get('mobile_code') || $post['LoginForm']['phone'] != $session->get('mobile')) {
                    return [
                        'code' => 10001,
                        'msg' => '验证码错误'
                    ];
                }
                if ($model->login()) {
                    return [
                        'code' => 10000,
                        'url' => Yii::$app->getUser()->getReturnUrl()
                    ];
                } else {
                    return [
                        'code' => 10001,
                        'msg' => '登录失败'
                    ];
                }
            }
        } else {
            Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    /**
     * 退出登录
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * 注册
     */
    public function actionRegister()
    {
        $model = new SignupForm();
        if ($post = Yii::$app->request->post()) {
            if ($model->load($post)) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $session = new Session();
                if ($post['verification'] != $session->get('mobile_code') || $post['SignupForm']['phone'] != $session->get('mobile')) {
                    return [
                        'code' => 10001,
                        'msg' => '验证码错误'
                    ];
                }
                if ($user = $model->signup()) {
                    if (Yii::$app->getUser()->login($user)) {
                        return [
                            'code' => 10000,
                            'url' => Yii::$app->getUser()->getReturnUrl()
                        ];
                    }
                } else {
                    return [
                        'code' => 10001,
                        'msg' => $model->errors['phone'][0]
                    ];
                }
            }
        }
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * 重设密码
     */
    public function actionResetPassword()
    {
        $model = new ResetPasswordForm();
        if ($post = Yii::$app->request->post()) {
            if ($model->load($post)) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $session = new Session();
                if ($post['verification'] != $session->get('mobile_code') || $post['ResetPasswordForm']['phone'] != $session->get('mobile')) {
                    return [
                        'code' => 10001,
                        'msg' => '验证码错误'
                    ];
                }
                if ($model->resetPassword()) {
                    return [
                        'code' => 10000,
                        'url' => '/login/index.html'
                    ];
                } else {
                    return [
                        'code' => 10001,
                        'msg' => $model->errors['phone'][0]
                    ];
                }
            }
        }
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * 发送短信
     */
    public function actionSendMsg()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $phone = Yii::$app->request->get('phone',null);
        $res = SendMsg::send($phone);
        if(!$res){
            return [
                'code' => 10001,
                'msg' => '短信发送失败，请重试！'
            ];
        }
        return [
            'code' => 10000,
            'msg' => '短信发送成功！'
        ];
    }

}
