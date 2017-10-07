<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Course;
use frontend\models\News;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Course controller
 */
class CourseController extends Controller
{
    /**
     * 课程列表
     */
    public function actionList()
    {
        $cid = \Yii::$app->request->get('cid',15);
        $curPage = \Yii::$app->request->get('page',1);

        //当前栏目内容
        $category = Category::getData($cid);
        if($category['parentid']==0){
            $parent = $category;
        }else{
            $parent = Category::getData($category['parentid']);
        }
        //课程栏目列表
        $sonCategory = Category::getModelSonList($parent['id'],3);
        //列表数据
        $pageSize = 6;//每页显示条数
        $data = Course::getPageList($cid,$curPage,$pageSize);
        $pages = new Pagination(['totalCount' => $data['count'], 'pageSize' => $pageSize]);
        //栏目列表模板
        $template = $category['list_template'] ? $category['list_template'] : 'list';

        return $this->render($template,[
            'category' => $category,
            'sonCategory' => $sonCategory,
            'data' => $data,
            'pages' => $pages,
            'parent' => $parent,
            'cid' => $cid,
        ]);
    }

    /**
     * 课程详情
     */
    public function actionView($id)
    {
        //获取课程详情
        $data = Course::getData($id);
        //当前栏目内容
        $category = Category::getData($data['catid']);
        //展示量+1
        News::clickNum($id);

        return $this->render('view',[
            'category' => $category,
            'data' => $data,
        ]);
    }
}
