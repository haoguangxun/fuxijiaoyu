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
        $category = Category::getData($cid);
        //新闻栏目列表
        $sonCategory = Category::getModelSonList(1,1);
        //列表数据
        $pageSize = 5;//每页显示条数
        $data = News::getPageList($cid,$curPage,$pageSize);
        $pages = new Pagination(['totalCount' => $data['count'], 'pageSize' => $pageSize]);

        return $this->render('list',[
            'category' => $category,
            'sonCategory' => $sonCategory,
            'data' => $data,
            'pages' => $pages,
            'cid' => $cid,
        ]);
    }

    /**
     * 文章详情
     */
    public function actionView($id)
    {
        //获取文章详情
        $data = News::getData($id);
        //展示量+1
        News::clickNum($id);

        return $this->render('view',[
            'data' => $data,
        ]);
    }
}
