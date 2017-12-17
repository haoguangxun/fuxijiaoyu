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
			<div class="gopay-main-top">
				支付成功
			</div>
		</div>
	</div>
</div>