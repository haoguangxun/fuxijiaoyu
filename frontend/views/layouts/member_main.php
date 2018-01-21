<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title.'-'.Yii::$app->params['name']) ?></title>
    <?php $this->registerMetaTag(array("name"=>"application-name","content"=> Html::encode(Yii::$app->params['name']))) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php $this->beginContent('@app/views/layouts/main.php');?>

<!--内容-->
<div class="personal">
    <div class="wrap">
        <div class="personal-main">
            <div class="personal-nav">
                <div class="personal-nav-top">
                    <div class="img" style="background-image: url(<?= Yii::$app->user->identity->photo ? Yii::$app->user->identity->photo : '/img/default-photo.png'?>);"></div>
                    <p>Hi,你好，<span><?= Yii::$app->user->identity->realname?></span></p>
                </div>
                <ul>
                    <li <?php if(Yii::$app->controller->action->id == 'index')echo "class='active'";?>>
                        <span class="iconfont icon-kehu"></span><a href="<?= Url::to(['member/index'])?>">个人资料</a>
                    </li>
                    <li <?php if(Yii::$app->controller->action->id == 'order')echo "class='active'";?>>
                        <span class="iconfont icon-dingdan"></span><a href="<?= Url::to(['member/order'])?>">我的订单</a>
                    </li>
                    <li <?php if(Yii::$app->controller->action->id == 'course')echo "class='active'";?>>
                        <span class="iconfont icon-kecheng"></span><a href="<?= Url::to(['member/course'])?>">我的课程</a>
                    </li>
                    <!--<li>
                        <span class="iconfont icon-xiazai"></span>下载内容
                    </li>-->
                    <!--<li>
                        <span class="iconfont icon-anquan"></span>帐号安全
                    </li>-->
                    <!--<li>
                        <span class="iconfont icon-tongzhi"></span>消息通知
                    </li>-->
                    <li <?php if(Yii::$app->controller->action->id == 'collection')echo "class='active'";?>>
                        <span class="iconfont icon-shoucang"></span><a href="<?= Url::to(['member/collection'])?>">我的收藏</a>
                    </li>
                    <li>
                        <span class="iconfont icon-tuichu"></span><a href="<?= Url::to(['login/logout'])?>">退出登录</a>
                    </li>
                </ul>
            </div>
            <div class="personal-content">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endContent();?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

