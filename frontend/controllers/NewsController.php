<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\News;
use frontend\models\Page;
use yii\data\Pagination;
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
        $cid = \Yii::$app->request->get('cid',1);
        $curPage = \Yii::$app->request->get('page',1);

        //当前栏目内容
        $category = Category::getData(1);
        //新闻栏目列表
        $newsCategory = Category::getSonList(1);
        //列表数据
        $pageSize = 5;//每页显示条数
        $data = News::getPageList($cid,$curPage,$pageSize);
        $pages = new Pagination(['totalCount' => $data['count'], 'pageSize' => $pageSize]);

        return $this->render('index',[
            'category' => $category,
            'newsCategory' => $newsCategory,
            'data' => $data,
            'pages' => $pages,
            'cid' => $cid,
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
