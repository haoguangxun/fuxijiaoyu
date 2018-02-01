<?php
/**
 * 支付宝支付回调
 */

namespace frontend\controllers;

use frontend\models\Course;
use frontend\models\Order;
use yii\web\Controller;
use Yii;

class AlipayController extends Controller
{

    /**
     * 支付完成同步回调
     */
    public function actionReturn()
    {
        require_once dirname(Yii::$app->basePath).'/vendor/alipay/pagepay/service/AlipayTradeService.php';

        $data = Yii::$app->request->get();
        $config = Yii::$app->params['alipay'];

        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($data);

        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功

            //请在这里加上商户的业务逻辑程序代码

            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            $out_trade_no = htmlspecialchars($data['out_trade_no']);//商户订单号
            $trade_no = htmlspecialchars($data['trade_no']);//支付宝交易号

            return $this->render('success',[
                'orderid' => $out_trade_no,
                'trade_no' => $trade_no
            ]);

        }
        else {
            //验证失败
            echo "验证失败";
        }

    }

    /**
     * 支付完成异步通知
     */
    public function actionNotify()
    {
        require_once dirname(Yii::$app->basePath).'/vendor/alipay/pagepay/service/AlipayTradeService.php';

        $data = Yii::$app->request->post();
        $config = Yii::$app->params['alipay'];

        $alipaySevice = new \AlipayTradeService($config);
        $alipaySevice->writeLog(var_export($data,true));
        $result = $alipaySevice->check($data);

        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功

            $out_trade_no = $data['out_trade_no'];//商户订单号
            $trade_no = $data['trade_no'];//支付宝交易号
            $trade_status = $data['trade_status'];//交易状态

            if ($trade_status == 'TRADE_SUCCESS') {//支付成功

                $model = new order();
                $data = $model->getOrder($out_trade_no);
                if(empty($data)) {
                    echo '请求非法！';
                }
                //修改订单状态
                if ($data['status'] != 1 ) {
                    $r = $model->updateOrderStatus($out_trade_no,1,$trade_no);
                    if(!$r) {
                        echo '请求失败！';
                    }
                }
                //购买量+1
                Course::salesNum($data['courseid']);

            }

            echo "success";

        }else {

            //验证失败
            echo "fail";

        }
    }
}
