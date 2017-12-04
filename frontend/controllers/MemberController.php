<?php

namespace frontend\controllers;

use common\models\MemberData;
use frontend\models\Member;
use frontend\models\News;
use frontend\models\Page;
use frontend\models\Teacher;
use yii\web\Controller;
use Yii;

/**
 * 学生会员中心
 * Member controller
 */
class MemberController extends Controller
{
    public $layout = 'member_main';

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
}
