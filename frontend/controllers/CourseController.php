<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Course;
use frontend\models\CourseCollection;
use frontend\models\CourseSection;
use frontend\models\Member;
use frontend\models\News;
use frontend\models\Order;
use frontend\models\Page;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;

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
        //获取课程收藏数量
        Course::clickNum($id);
        //获取用户是否收藏此课程
        Course::clickNum($id);
        //学员是否购买此课程
        $signup = false;
        if(!Yii::$app->user->isGuest){
            $signup = Order::getSignup($id);
        }
        //模板
        $template = $data['template'] ? $data['template'] : $category['view_template'] ? $category['view_template'] : 'view';

        return $this->render($template,[
            'category' => $category,
            'parent' => $parent,
            'data' => $data,
            'teacher' => $teacher,
            'signup' => $signup,
        ]);
    }

    /**
     * 课程小节
     */
    public function actionSection($id)
    {
        $sid = intval(Yii::$app->request->get('sid',0));
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
        //小节列表
        $list = CourseSection::getList($id);
        //学员是否购买此课程
        $signup = false;
        if(!Yii::$app->user->isGuest){
            $signup = Order::getSignup($id);
        }
        //小节内容
        $detail = [];
        $template = 'section';
        if($list){
            $sid = $sid ? $sid : $list[0]['id'];
            $detail = CourseSection::getData($sid);
            //模板
            $template = $detail['template'] ? $detail['template'] : 'section';
            //如果学员未购买且该小节不可免费试学
            if($detail['audition']==0 && $signup==false){
                $detail = [];
            }
        }

        return $this->render($template,[
            'category' => $category,
            'parent' => $parent,
            'data' => $data,
            'teacher' => $teacher,
            'list' => $list,
            'detail' => $detail,
            'signup' => $signup,
        ]);
    }


    /**
     * 课程收藏
     * $id 课程id
     * $type 1收藏，2取消
     */
    public function actionCollection($id,$type)
    {
        if(Yii::$app->user->isGuest){
            $this->redirect(Url::to(['login/index']));
            return false;
        }

        $id = intval(Yii::$app->request->get('id',0));
        $type = Yii::$app->request->get('type',0);
        $model = new CourseCollection();
        if($type == 1){
            $res = $model->add($id);
        }elseif($type == 2){
            $res = $model->del($id);
        }
        if($res){
            return [
                'code' => 10000,
                'msg' => '成功'
            ];
        }else{
            return [
                'code' => 10001,
                'msg' => '失败'
            ];
        }
    }
}
