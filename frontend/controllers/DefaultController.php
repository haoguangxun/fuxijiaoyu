<?php

namespace frontend\controllers;

use frontend\models\Ad;
use frontend\models\News;
use frontend\models\Page;
use frontend\models\Teacher;
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
        //单网页内容
        $page = Page::getData();
        //课程体系
        $curriculumSystem = News::getList(35);
        //师资力量
        $teacherList = Teacher::getList(2,16);
        //学员体会与感受
        $studentExperience = News::getList(23);
        //行业动态
        $industryTrendsPic = News::getList(4,1);
        $industryTrends = News::getList(4,3,1);
        //新闻动态
        $newsTrendsPic = News::getList(1,1);
        $newsTrends = News::getList(1,3,1);
        //轮播图
        $ad = Ad::getList(1);

        return $this->render('index',[
            'page' => $page,
            'curriculumSystem' => $curriculumSystem,
            'teacherList' => $teacherList,
            'studentExperience' => $studentExperience,
            //'industryTrendsPic' => $industryTrendsPic,
            //'industryTrends' => $industryTrends,
            'newsTrendsPic' => $newsTrendsPic,
            'newsTrends' => $newsTrends,
            'ad' => $ad,
        ]);
    }
}
