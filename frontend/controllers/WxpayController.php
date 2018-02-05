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

        $postXml = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postArr = $this->FromXml($postXml);

        // 查询是否支付成功
        $res = $notify->Queryorder($postArr['transaction_id']);
        if ($res) {
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
        $this->values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $this->values;
    }

}

