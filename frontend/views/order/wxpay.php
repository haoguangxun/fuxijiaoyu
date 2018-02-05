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
					<div class="pay_cont pay_cont2 wrap">
						<img alt="扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?= urlencode($code_url)?>" style="width:150px;height:150px;"/>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>