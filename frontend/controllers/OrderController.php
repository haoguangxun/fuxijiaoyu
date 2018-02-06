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
        header("Content-Type:text/html; charset=UTF-8");

        $post = Yii::$app->request->post();
        if(empty($post)){
            throw new NotFoundHttpException('参数错误！');
        }

        if($post['pay_type'] == 1){//微信支付

            require_once __DIR__ . '/../../common/vendors/wxpay/lib/WxPay.Api.php';
            require_once __DIR__ . '/../../common/vendors/wxpay/example/WxPay.NativePay.php';
            require_once __DIR__ . '/../../common/vendors/wxpay/example/log.php';

            $input = new \WxPayUnifiedOrder();
            $input->SetBody(trim($post['subject']));
            $input->SetAttach(trim($post['subject']));
            $input->SetOut_trade_no(trim($post['orderid']));
            $input->SetTotal_fee(trim($post['total_amount']) * 100);
            $input->SetTime_start(date("YmdHis"));
            $input->SetTime_expire(date("YmdHis", time() + 600));
            $input->SetGoods_tag("");
            $input->SetNotify_url("http://www.fuxiguoxue.com/wxpay/notify.html"); // 地址是外网能访问的，且不能包含参数
            $input->SetTrade_type("NATIVE");
            $input->SetProduct_id(trim($post['courseid']));
            $notify = new \NativePay();
            $result = $notify->GetPayUrl($input);

            if(isset($result['err_code']) && $result['err_code'] == 'ORDERPAID'){ //订单已支付
                $this->redirect(Url::to(['order/success',
                    'orderid' => $post['orderid'],
                    'total_amount' => $post['total_amount'],
                    'courseid' => $post['courseid']
                ]));
            }else{ //订单未支付
                $code_url = $result["code_url"];
                return $this->render('wxpay',[
                    'orderid' => $post['orderid'],
                    'total_amount' => $post['total_amount'],
                    'courseid' => $post['courseid'],
                    'code_url' => $code_url
                ]);
            }

        }elseif($post['pay_type'] == 2){//支付宝支付
            require(__DIR__ . '/../../common/vendors/alipay/pagepay/service/AlipayTradeService.php');
            require(__DIR__ . '/../../common/vendors/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php');

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

    /**
     * 支付成功
     */
    public function actionSuccess()
    {
        $get = Yii::$app->request->get();
        return $this->render('success',[
            'orderid' => $get['orderid'],
            //'trade_no' => $get['trade_no'],
            'total_amount' => $get['total_amount'],
            'courseid' => $get['courseid']
        ]);
    }


}
