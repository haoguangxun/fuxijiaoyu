<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Course;
use frontend\models\Member;
use frontend\models\News;
use frontend\models\Page;
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
        $pageSize = $parent['id']==40 ? 8 :6;//每页显示条数
        $data = Course::getPageList($cid,$curPage,$pageSize);
        $pages = new Pagination(['totalCount' => $data['count'], 'pageSize' => $pageSize]);

        $temp_params = [
            'category' => $category,
            'sonCategory' => $sonCategory,
            'data' => $data,
            'pages' => $pages,
            'parent' => $parent,
            'cid' => $cid,
        ];

        if($parent['id'] == 15){//课程体系
            //校区环境
            $campus = News::getList(41,3);
            $temp_params['campus'] = $campus;

        }elseif($parent['id'] == 42){//伏羲体验
            //热门课程
            $hot = Course::getHotList($cid,10);
            $temp_params['hot'] = $hot;
            //课程体验底部
            $page = Page::getData();
            $temp_params['page'] = $page;
        }elseif($parent['id'] == 40){//在线授课
            //教师列表
            $teacher = Member::getTeacherList();
            $temp_params['teacher'] = $teacher;
        }

        //栏目列表模板
        $template = $category['list_template'] ? $category['list_template'] : 'list';

        return $this->render($template,$temp_params);
    }

    /**
     * 课程详情
     */
    public function actionView($id)
    {
        //获取课程详情
        $data = Course::getData($id);
        //获取教师信息
        $teacher = Member::getData($data['teacherid']);
        //当前栏目内容
        $category = Category::getData($data['catid']);
        if($category['parentid']==0){
            $parent = $category;
        }else{
            $parent = Category::getData($category['parentid']);
        }
        //展示量+1
        Course::clickNum($id);

        //模板
        $template = $data['template'] ? $data['template'] : $category['view_template'] ? $category['view_template'] : 'view';

        return $this->render($template,[
            'category' => $category,
            'parent' => $parent,
            'data' => $data,
            'teacher' => $teacher,
        ]);
    }
}
