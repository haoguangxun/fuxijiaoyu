<?php
use yii\helpers\Html;

$this->title = '微信扫码支付';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/pay.css',['depends'=>['frontend\assets\AppAsset']]);

?>
<!--内容-->
<div class="gopay">
	<div class="wrap">
		<div class="gopay-main">
			<div class="gopay-main-top" style="border: none">

				<div class="cont pay_top">
					<div class="pay_cont pay_cont2 wrap" style="text-align:center;">
						<img alt="扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?= urlencode($code_url)?>" style="width:200px;height:200px;"/>
                        <p style="margin-top:25px;font-size:14px;">微信扫一扫支付</p>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// 检测是否支付成功
	$(document).ready(function () {
		setInterval("ajaxstatus()", 3000);
	});

	function ajaxstatus() {
		var out_trade_no = "<?=$orderid?>";
		if (out_trade_no != 0) {
			$.ajax({
				url: "<?=\yii\helpers\Url::to(['wxpay/query-order'])?>",
				type: "GET",
				dataType:"json",
				data: {
					out_trade_no: out_trade_no,
				},
				success: function (json) {
					if (json.code == 10000) { //订单状态为10000表示支付成功
						window.location.href = "<?=\yii\helpers\Url::to(['order/success','orderid'=>$orderid,'total_amount'=>$total_amount,'courseid'=>$courseid])?>";
					}
				}
			});
		}
	}
</script>