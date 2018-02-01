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
        $post = Yii::$app->request->post();
        if(empty($post)){
            throw new NotFoundHttpException('参数错误！');
        }

        if($post['pay_type'] == 1){//微信支付



        }elseif($post['pay_type'] == 2){//支付宝支付

            require_once dirname(Yii::$app->basePath).'/vendor/alipay/pagepay/service/AlipayTradeService.php';
            require_once dirname(Yii::$app->basePath).'/vendor/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

            //构造参数
            $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
            $payRequestBuilder->setBody(trim($post['body']));
            $payRequestBuilder->setSubject(trim($post['subject']));
            $payRequestBuilder->setTotalAmount(trim($post['total_amount']));
            $payRequestBuilder->setOutTradeNo(trim($post['orderid']));

            $config = Yii::$app->params['alipay'];
            $aop = new \AlipayTradeService($config);

            $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

            //输出表单
            var_dump($response);

        }

    }


}
