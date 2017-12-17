<?php

namespace frontend\controllers;

use backend\modules\member\models\Member;
use frontend\models\Course;
use frontend\models\Order;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * 购买课程
 * Order controller
 */
class OrderController extends Controller
{

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
     * 课程报名
     * $id 课程ID
     */
    public function actionPost()
    {
        $id = intval(Yii::$app->request->get('id',0));
        if(empty($id)){
            throw new NotFoundHttpException('请通过正确的URL访问！');
        }
        $course = Course::find()->where(['id'=>$id])->asArray()->one();
        if(empty($course)){
            throw new NotFoundHttpException('请通过正确的URL访问！');
        }
        $model = new Order();
        if(!$orderid = $model->post($course)){
            throw new NotFoundHttpException('服务器繁忙，请重新操作！');
        }else{
            $member = Member::find()->select('realname')->where(['id'=>$course['teacherid']])->asArray()->one();
            return $this->render('post',[
                'course' => $course,
                'teacher' => $member['realname'],
                'orderid' => $orderid,
            ]);
        }

    }

    /**
     * 支付
     */
    public function actionPay()
    {

    }

    /**
     * 支付成功回调
     */
    public function actionPaySuccess()
    {
        $orderid = Yii::$app->request->get('orderid',0);
        $pay_number = Yii::$app->request->get('pay_number',0);
        if(empty($orderid) || empty($pay_number)){
            throw new NotFoundHttpException('请求非法1！');
        }
        $model = new order();
        $data = $model->getOrder($orderid);
        if(empty($data) || $data['userid'] != Yii::$app->user->identity->id) {
            throw new NotFoundHttpException('请求非法！');
        }

        if ($data['status'] != 1 ) {
            $r = $model->updateOrderStatus($orderid,1,$pay_number);
            if(!$r) {
                throw new NotFoundHttpException('请求失败！');
            }
        }

        return $this->render('success',[
            'orderid' => $orderid
        ]);
    }

}
