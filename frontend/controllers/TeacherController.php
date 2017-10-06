<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Teacher;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Teacher controller
 */
class TeacherController extends Controller
{

    /**
    * 教师列表
    */
    public function actionList()
    {
        $cid = \Yii::$app->request->get('cid',2);
        $curPage = \Yii::$app->request->get('page',1);

        //当前栏目内容
        $category = Category::getData($cid);
        //教师栏目列表
        $sonCategory = Category::getModelSonList(2,2);
        //列表数据
        $pageSize = 6;//每页显示条数
        $data = Teacher::getPageList($cid,$curPage,$pageSize);
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
     * 教师详情
     */
    public function actionView($id)
    {
        //获取教师详情
        $data = Teacher::getData($id);
        //当前栏目内容
        $category = Category::getData($data['catid']);
        //更多阅读
        $more = Teacher::getList($data['catid'],3);

        return $this->render('view',[
            'category' => $category,
            'data' => $data,
            'more' => $more,
        ]);
    }
}
