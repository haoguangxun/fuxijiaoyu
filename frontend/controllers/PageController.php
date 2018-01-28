<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Page;
use yii\web\Controller;

/**
 * News controller
 */
class PageController extends Controller
{
    /**
     * 单页图文
     */
    public function actionIndex()
    {
        $cid = \Yii::$app->request->get('cid',1);

        //当前栏目内容
        $category = Category::getData($cid);
        //单页图文内容
        $data = Page::getData($cid);
        //栏目列表模板
        $template = $data['template'] ? $category['template'] : 'index';

        return $this->render($template,[
            'category' => $category,
            'data' => $data,
            'cid' => $cid,
        ]);
    }

}
