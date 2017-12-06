<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Alert;

$this->title = '学员中心-我的收藏';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/personal.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/personal.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="personal-title">我的收藏</div>
<div class="personal-form" style="height:600px;">

</div>