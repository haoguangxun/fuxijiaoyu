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

<!--头部-->
<div class="header">
    <div class="wrap">
        <div class="text">欢迎光临伏羲国学</div>
        <div class="function">
            <div class="seach">
                <span class="iconfont icon-sousuo"></span>搜索
            </div>
            <div class="QQ iconfont icon-qq"></div>
            <div class="WX iconfont icon-weixin"></div>
            <div class="user">
                <?php if (Yii::$app->user->isGuest) {?>
                    <div class="login"><a href="<?= Url::to(['login/index'])?>">登陆</a></div>
                    <div class="register"><a href="<?= Url::to(['login/register'])?>">注册</a></div>
                <?php }else{?>
                    你好，<?= Yii::$app->user->identity->realname ? Yii::$app->user->identity->realname : Yii::$app->user->identity->phone ?>
                    <?php if(Yii::$app->user->identity->type == 1){?>
                        <?= Html::a('会员中心', ['member/index']) ?>
                    <?php }else{?>
                        <?= Html::a('教师中心', ['teacher-member/index']) ?>
                    <?php }?>
                    <?= Html::a('退出登录', ['login/logout']) ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!--搜索-->
<div class="seach-main">
    <div class="search_top">
        <div class="wrap">
            <form action="" method="" class="search_ipt">
                <input type="text" placeholder="如: 古琴教学" name="q" class="data_q">
            </form>
            <img src="/img/search_hover.png" alt="" class="sea_hover">
            <img src="/img/search_close.png" alt="" class="sea_close">
        </div>
    </div>
    <div class="search_content">
        <div class="wrap">
        </div>
    </div>
</div>
<!--微信-->
<div class="weixin-content">
    <div class="weixin-content-img"><img src="/img/ewm.png"/></div>
</div>
<div class="wrap">
    <div class="nav">
        <a href="index.html" class="logo"><img src="/img/logo.png"/></a>
        <ul class="nav-main" id="nav">
            <a href="<?= Url::to(['default/index'])?>"><li>首页</li></a>
            <a href="<?= Url::to(['about/index'])?>"><li>学院概括</li></a>
            <a href="<?= Url::to(['course/list','cid'=>15])?>"><li>课程体系</li></a>
            <a href="<?= Url::to(['teacher/list'])?>"><li>师资力量</li></a>
            <a href="<?= Url::to(['course/list','cid'=>42])?>"><li>伏羲体验</li></a>
            <a href="<?= Url::to(['student/index'])?>"><li>学员成长</li></a>
            <a href="<?= Url::to(['course/list','cid'=>40])?>"><li>在线授课</li></a>
            <a href="<?= Url::to(['news/list'])?>"><li>新闻动态</li></a>
            <a href="<?= Url::to(['about/contact'])?>"><li>联系我们</li></a>
        </ul>
    </div>
</div>
<div class="topNav">
    <div class="wrap">
        <ul class="nav-main">
            <a href="<?= Url::to(['default/index'])?>"><li>首页</li></a>
            <a href="<?= Url::to(['about/index'])?>"><li>学院概括</li></a>
            <a href="<?= Url::to(['course/list','cid'=>15])?>"><li>课程体系</li></a>
            <a href="<?= Url::to(['teacher/list'])?>"><li>师资力量</li></a>
            <a href="<?= Url::to(['course/list','cid'=>42])?>"><li>伏羲体验</li></a>
            <a href="<?= Url::to(['student/index'])?>"><li>学员成长</li></a>
            <a href="<?= Url::to(['course/list','cid'=>40])?>"><li>在线授课</li></a>
            <a href="<?= Url::to(['news/list'])?>"><li>新闻动态</li></a>
            <a href="<?= Url::to(['about/contact'])?>"><li>联系我们</li></a>
        </ul>
    </div>
</div>
<!--手机导航-->
<div class="ghh">
    <div class="gh">
        <a href="#"></a>
    </div>
</div>
<div class="gb_bg">
    <div class="nav2">
        <ul>
            <a href="<?= Url::to(['default/index'])?>"><li>首页</li></a>
            <a href="<?= Url::to(['about/index'])?>"><li>学院概括</li></a>
            <a href="<?= Url::to(['course/list','cid'=>15])?>"><li>课程体系</li></a>
            <a href="<?= Url::to(['teacher/list'])?>"><li>师资力量</li></a>
            <a href="<?= Url::to(['course/list','cid'=>42])?>"><li>伏羲体验</li></a>
            <a href="<?= Url::to(['student/index'])?>"><li>学员成长</li></a>
            <a href="<?= Url::to(['course/list','cid'=>40])?>"><li>在线授课</li></a>
            <a href="<?= Url::to(['news/list'])?>"><li>新闻动态</li></a>
            <a href="<?= Url::to(['about/contact'])?>"><li>联系我们</li></a>
        </ul>
    </div>
</div>
<!--右侧快捷按钮-->
<div class="right-fdd2">
    <ul>
        <li>
            <span class="iconfont icon-qq"></span>
            <a href="tencent://message/?uin=123456789&amp;Site=QQ咨询&amp;Menu=yes">在线咨询</a>
        </li>
        <li>
            <span class="iconfont icon-phone"></span>
            <a>咨询电话:111</a>
        </li>
        <li>
            <span class="iconfont icon-weixin"></span>
            <a href="javascript:;">微信</a>
        </li>
        <li class="returnTop">
            <span class="iconfont icon-top"></span>
            <a href="javascript:;">返回顶部</a>
        </li>
    </ul>
</div>

<?= $content ?>

<div class="footer">
    <div class="wrap">
        <p>© 2006 Fu Xi piano court.伏羲国学</p>
        <p>备案许可证号: 京12043844号   010-67906868转606（周一至周日：7:00 - 24:00）热线电话：010-67906868</p>
        <div class="foot-contact">
            <div class="foot-contact-link">
                <div class="xinlang">
                    <img src="/img/xinlang.png"/>
                    <p>新浪微博</p>
                </div>
                <div class="weixin">
                    <img src="/img/weixin.png"/>
                    <p>微信</p>
                </div>
            </div>
            <div class="ewm">
                <img src="/img/ewm.png"/>
                <p>关注伏羲微信</p>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

