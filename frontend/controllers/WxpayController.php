<?php
/**
 * 微信支付回调
 */

namespace frontend\controllers;

use frontend\models\Course;
use frontend\models\Order;
use yii\web\Controller;
use Yii;

require_once __DIR__ . '/../../common/vendors/wxpay/example/notify.php';

class WxpayController extends Controller
{

    /**
     * 支付完成异步通知
     */
    public function actionNotify()
    {

        \Log::DEBUG("begin notify");
        $notify = new \PayNotifyCallBack();
        $notify->Handle(false);


        $postXml = $GLOBALS["HTTP_RAW_POST_DATA"];
        \Log::DEBUG($postXml);
        $postArr = $this->FromXml($postXml);
        \Log::DEBUG($postArr);
        // 查询是否支付成功
        $res = $notify->Queryorder($postArr['transaction_id']);
        \Log::DEBUG($res);
        if ($res['trade_state'] == 'SUCCESS') {
            //业务逻辑
            $model = new order();
            $data = $model->getOrder($postArr['out_trade_no']);
            if(empty($data)) {
                exit('请求非法！');
            }
            //修改订单状态
            if ($data['status'] != 1 ) {
                $r = $model->updateOrderStatus($postArr['out_trade_no'],1,$postArr['transaction_id'],2);
                if(!$r) {
                    exit('请求失败！');
                }
                //购买量+1
                Course::salesNum($data['courseid']);
            }

        }

    }

    //查询订单
    public function actionQueryOrder()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out_trade_no = Yii::$app->request->get('out_trade_no',0);
        if(empty($out_trade_no)){
            return [
                'code' => 10001,
                'msg' => 'ERROR'
            ];
        }
        $notify = new \PayNotifyCallBack();
        if($res = $notify->Queryorder(0,$out_trade_no))
        {
            if($res['trade_state'] == 'SUCCESS'){
                return [
                    'code' => 10000,
                    'msg' => 'SUCCESS'
                ];
            }else{
                return [
                    'code' => 10001,
                    'msg' => 'NOPAY'
                ];
            }
        }
        return [
            'code' => 10001,
            'msg' => 'ERROR'
        ];

    }


    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
    public function FromXml($xml)
    {
        if(!$xml){
            throw new \WxPayException("xml数据异常！");
        }
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $arr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $arr;
    }

}

