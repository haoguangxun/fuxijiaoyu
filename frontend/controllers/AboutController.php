<?php

namespace frontend\controllers;

use frontend\models\Ad;
use frontend\models\Category;
use frontend\models\News;
use frontend\models\Page;
use yii\web\Controller;

/**
 * About controller
 */
class AboutController extends Controller
{
    /**
     * 关于我们
     */
    public function actionIndex()
    {
        //当前栏目内容
        $category = Category::getData(25);
        //单网页内容
        $page = Page::getData();
        //品牌历程
        $brandProcess1 = News::getList(28,3);
        $brandProcess2 = News::getList(28,3,4);
        //大事件MEMORABILIA
        $memorabilia = News::getList(30,3);
        //品牌介绍图片
        $brandAd = Ad::getList(5,4);

        return $this->render('index',[
            'category' => $category,
            'page' => $page,
            'brandProcess1' => $brandProcess1,
            'brandProcess2' => $brandProcess2,
            'memorabilia' => $memorabilia,
            'brandAd' => $brandAd,
        ]);
    }

    /**
     * 联系我们
     */
    public function actionContact()
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
