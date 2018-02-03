<?php
use yii\helpers\Html;

$this->title = '支付成功';
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
						<div class="pay_hr pay_hr2">
							<img src="/img/pay.png" alt="">
							<span>恭喜您，支付成功！</span>
						</div>
						<div class="pay_suc">
							<span>订单编号：<em><?= $orderid?></em></span>
							<span>您已成功支付：<i><?= $total_amount?>元</i> <!--<font>（我们会在20分钟内为您尽快发货）</font>--></span>
						</div>
						<p class="pay_p"><span>*温馨提示：</span>官方销售点：<!--北京市丰台区万丰路300号宁波银行写字楼303室，地铁9号或14号A口出向北200米过一个红绿灯继续向北100米左手边即到--></p>
						<div class="pay_other">
							您还可以
							<!--<a href="" class="contiu">继续购买</a>
							<a href="">查看积分</a>
							<span>|</span>-->
							<a href="<?= \yii\helpers\Url::to(['member/order']);?>">查看我的订单</a>
							<span>|</span>
							<a href="<?= \yii\helpers\Url::to(['member/course']);?>">查看我的课程</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>