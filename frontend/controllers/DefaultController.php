<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\News;
use common\models\Page;
use common\models\Teacher;
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
        $curriculumSystem = Category::getSonList(15);
        //师资力量简介
        $teacherForce = Category::getData(2);
        //师资力量
        $teacherList = Teacher::getList($limit = 10);
        //学员成长简介
        $studentGrowth = Category::getData(20);
        //学员体会与感受
        $studentExperience = News::getList(23);
        //行业动态
        $industryTrendsPic = News::getList(4,1);
        $industryTrends = News::getList(4,3,1);
        //最新动态
        $newsTrendsPic = News::getList(8,1);
        $newsTrends = News::getList(8,3,1);

        return $this->render('index',[
            'page' => $page,
            'curriculumSystem' => $curriculumSystem,
            'teacherForce' => $teacherForce,
            'teacherList' => $teacherList,
            'studentGrowth' => $studentGrowth,
            'studentExperience' => $studentExperience,
            'industryTrendsPic' => $industryTrendsPic,
            'industryTrends' => $industryTrends,
            'newsTrendsPic' => $newsTrendsPic,
            'newsTrends' => $newsTrends,
        ]);
    }
}
