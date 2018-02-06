<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once __DIR__ . '/../../../../common/vendors/wxpay/lib/WxPay.Api.php';
require_once __DIR__ . '/../../../../common/vendors/wxpay/lib/WxPay.Notify.php';
require_once __DIR__ . '/../../../../common/vendors/wxpay/example/log.php';

//初始化日志
$logHandler= new CLogFileHandler(__DIR__ . '/../../../../common/vendors/wxpay/logs.txt');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id = 0,$out_trade_no = 0)
	{
		$input = new WxPayOrderQuery();
		if(!empty($transaction_id)){
			$input->SetTransaction_id($transaction_id);//微信订单号
		}else{
			$input->SetOut_trade_no($out_trade_no);//商户订单号
		}
		$result = WxPayApi::orderQuery($input);
		if(!empty($transaction_id)) {
			Log::DEBUG("query:" . json_encode($result));
		}
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return $result;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		return true;
	}
}

//Log::DEBUG("begin notify");
//$notify = new PayNotifyCallBack();
//$notify->Handle(false);
