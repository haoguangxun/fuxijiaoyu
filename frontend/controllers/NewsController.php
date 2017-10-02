<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\News;
use common\models\Page;
use yii\web\Controller;

/**
 * News controller
 */
class NewsController extends Controller
{
    /**
     * 文章列表
     */
    public function actionList()
    {
        //当前栏目内容
        $category = Category::getData(25);
        //列表数据
        $data = News::getList(28,3);

        return $this->render('index',[
            'category' => $category,
            'data' => $data,
        ]);
    }

    /**
     * 文章详情
     */
    public function actionView()
    {
        //当前栏目内容
        $category = Category::getData(33);
        //单网页内容
        $page = Page::getData(33);

        return $this->render('contact',[
            'category' => $category,
            'page' => $page,
        ]);
    }
}
