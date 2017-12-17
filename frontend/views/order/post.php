<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Alert;

$this->title = '课程报名';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/pay.css',['depends'=>['frontend\assets\AppAsset']]);
if( Yii::$app->getSession()->hasFlash('success') ) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-success',
		],
		'body' => Yii::$app->getSession()->getFlash('success'),
	]);
}
if( Yii::$app->getSession()->hasFlash('error') ) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-error',
		],
		'body' => Yii::$app->getSession()->getFlash('error'),
	]);
}
?>
<!--内容-->
<div class="gopay">
	<div class="wrap">
		<div class="gopay-main">
			<div class="gopay-main-top">
				<div class="form-title">
					<div class="sign-nav sign-name"><span>课程名称</span></div>
					<div class="sign-nav sign-num"><span>授课教师</span></div>
					<div class="sign-nav sign-price"><span>课程价格</span></div>
					<!--<div class="sign-nav sign-discount"><span>优惠</span></div>
					<div class="sign-nav sign-all"><span>小计</span></div>-->
				</div>
				<div class="form-item">
					<ul>
						<li class="sign-nav content-name"><a href="<?=Url::to(['course/view','id'=>$course['id']])?>"><?= $course['name']?></a></li>
						<li class="sign-nav content-num"><?= $teacher?></li>
						<li class="sign-nav content-price">￥ <?= $course['price']?></li>
						<!--<li class="sign-nav content-discount">￥ 5000</li>
						<li class="sign-nav content-all">￥ 5000</li>-->
					</ul>
				</div>
				<!--<div class="item-all-price">报名总额 <span>￥ <span id="item-all-price">5000</span></span></div>-->
			</div>
			<!--<div class="gopay-main-center">
				<div class="title-name">邀请码</div>
				<div class="code">
					<div class="code-input">
						<input type="checkbox" id="code"/>
						<label for="code">使用邀请码</label>
						<span class="iconfont icon-cus"></span>
					</div>
					<div class="code-price">
						<span>-</span>￥ 0
					</div>
				</div>
			</div>-->
			<div class="gopay-main-center">
				<div class="title-name">学员信息</div>
				<div class="gopay-phone">
					<span>学员姓名</span>
					<?= Yii::$app->user->identity->realname ?>
				</div>
				<div class="gopay-phone">
					<span>手机号码</span>
					<?= Yii::$app->user->identity->phone ?>
					<!--<input type="text" placeholder="留下手机号码，为您提供更好的课程服务 "/>-->
				</div>
			</div>
			<div class="platform">
				<div class="platform-title"><span class="iconfont icon-arrowR"></span> 平台支付（微信 支付宝）</div>
				<div class="platform-choice">
					<span class="platform-zfb"><img src="/img/zfb.jpg"/></span>
					<span class="platform-wx"><img src="/img/wx.jpg"/></span>
				</div>
			</div>
			<!--<div class="pay-btn"><span>立即支付</span></div>-->
			<div class="problem">
				<h2>付款中遇到问题：</h2>
				<p>如您的订单金额较大。</p>
				<p>建议您切换到IE浏览器进行支付，如提示“需安装控件”请立即安装。</p>
				<p>如无法在线支付，请联系客服，客服电话：010-67906868</p>
			</div>
			<div class="gopay-main-footer">
				<!--<div class="discount">已为您 抵扣<span>￥0</span></div>-->
				<div class="all-price">￥ <span><?= $course['price']?></span></div>
				<div class="gopay-btn"><a href="<?= Url::to(['order/pay-success','orderid'=>$orderid,'pay_number'=>10000])?>">确认支付</a></div>
			</div>
		</div>
	</div>
</div>