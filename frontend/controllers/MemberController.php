<?php

namespace frontend\controllers;

use common\models\MemberData;
use frontend\models\Member;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use frontend\models\search\OrderSearch;
use frontend\models\search\CourseCollectionSearch;

/**
 * 学生会员中心
 * Member controller
 */
class MemberController extends Controller
{
    public $layout = 'member_main';

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

    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',
            ]
        ];
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
     * 我的订单
     */
    public function actionOrder()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('order', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 我的课程
     */
    public function actionCourse()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(['OrderSearch'=>['status'=>1]]);
        return $this->render('course', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 我的收藏
     */
    public function actionCollection()
    {
        $searchModel = new CourseCollectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('collection', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
