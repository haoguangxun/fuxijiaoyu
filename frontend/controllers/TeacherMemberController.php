<?php

namespace frontend\controllers;

use common\models\MemberData;
use frontend\models\Member;
use frontend\models\search\CourseSearch;
use frontend\models\search\StudentSearch;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;

/**
 * 教师会员中心
 * TeacherMember controller
 */
class TeacherMemberController extends Controller
{
    public $layout = 'teacher_member_main';

    public function beforeAction($action)
    {
        if(parent::beforeAction($action)) {
            if(Yii::$app->user->isGuest){
                $this->redirect(Url::to(['login/index']));
                return false;
            }
            return true;
        }
    }

    /**
     * 个人资料
     */
    public function actionIndex()
    {
        $request = Yii::$app->request->post();
        if($request){
            $model = new Member();
            if($model->saveData($request)){
                \Yii::$app->getSession()->setFlash('success', '保存成功！');
            }else{
                \Yii::$app->getSession()->setFlash('error', '保存失败！');
            }
        }

        $model = Member::findOne(Yii::$app->user->identity->id);
        $data_model = MemberData::findOne(Yii::$app->user->identity->id);
        return $this->render('index',[
            'model' => $model,
            'data_model' => $data_model,
        ]);
    }

    /**
     * 我的课程
     */
    public function actionCourse()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(['CourseSearch'=>['teacherid'=>Yii::$app->user->identity->id]]);

        return $this->render('course', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 我的学生
     */
    public function actionStudent()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('student', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
