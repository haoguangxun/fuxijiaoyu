<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Course;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

/**
 * Search controller
 */
class SearchController extends Controller
{
    /**
     * 搜索
     */
    public function actionIndex()
    {
        $keyword = \Yii::$app->request->get('keyword',null);

        //课程栏目内容
        $category = Category::getData(15);
        $temp_params = [
            'category' => $category,
            'keyword' => $keyword,
        ];

        if(!empty($keyword)){
            $curPage = \Yii::$app->request->get('page',1);
            //列表数据
            $pageSize = 6;//每页显示条数
            $data = Course::getSearchList($keyword,$curPage,$pageSize);
            $pages = new Pagination(['totalCount' => $data['count'], 'pageSize' => $pageSize]);
            $temp_params['data'] = $data;
            $temp_params['pages'] = $pages;
        }

        return $this->render('index',$temp_params);
    }

}
