<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Default controller
 */
class DefaultController extends Controller
{
    /**
     * 首页
     */
    public function actionIndex()
    {

        return $this->render('index');
    }
}
