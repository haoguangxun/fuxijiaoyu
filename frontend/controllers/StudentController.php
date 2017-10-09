<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\News;
use yii\web\Controller;

/**
 * Student controller
 */
class StudentController extends Controller
{
    /**
     * 学员成长栏目首页
     */
    public function actionIndex()
    {
        $cid = \Yii::$app->request->get('cid',20);
        //当前栏目内容
        $category = Category::getData($cid);
        //伏羲学员采访
        $interview = News::getList(21,4);
        //学员风采
        $style = News::getList(22,16);
        //学员成长与体会
        $growup = News::getList(23,6);
        //学员荣获奖项与作品
        $prize = News::getList(24,8);

        return $this->render('index',[
            'category' => $category,
            'interview' => $interview,
            'style' => $style,
            'growup' => $growup,
            'prize' => $prize,
        ]);
    }

    /**
     * 学员信息详情
     */
    public function actionView($id)
    {
        //获取文章详情
        $data = News::getData($id);
        //当前栏目内容
        $category = Category::getData($data['catid']);
        //更多阅读
        $more = News::getList($data['catid'],3);
        //展示量+1
        News::clickNum($id);

        return $this->render('view',[
            'category' => $category,
            'data' => $data,
            'more' => $more,
        ]);
    }
}
