<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/curriculum.css',['depends'=>['frontend\assets\AppAsset']]);
//分享
$this->registerJsFile('http://static.bshare.cn/b/buttonLite.js#style=-1&uuid=&pophcol=2&lang=zh',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('http://static.bshare.cn/b/bshareC0.js',['depends'=>['frontend\assets\AppAsset']]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="system">
    <div class="wrap">
        <div class="home-title">
            <h2><?=Html::encode($parent['en_catname'])?></h2>
            <h1><?=Html::encode($parent['catname'])?></h1>
            <span></span>
        </div>
        <div class="system-nav">
            <a href="<?=Url::to(['course/list','cid'=>$parent['id']])?>">
                <span <?php if($category['parentid']==0) echo "class='active'";?>>所有课程</span>
            </a>
            <?php
            if(!empty($sonCategory)){
                foreach ($sonCategory as $value):
                    ?>
                    <a href="<?=Url::to(['course/list','cid'=>$value['id']])?>">
                    <span <?php if($cid == $value['id']) echo "class='active'";?>>
                        <?= Html::encode($value['catname'])?>
                    </span>
                    </a>
                <?php endforeach;
            }?>
        </div>
        <!--<div class="category">
            <div class="form-select">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">最新</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">课程体系</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">内容类型</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">难度等级</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
            </div>
        </div>-->
        <div class="img-btn">
            <ul>
                <li>
                    <div style="background-image: url(/img/banner-home1.jpg);">古琴初级班</div>
                </li>
                <li>
                    <div style="background-image: url(/img/banner-home1.jpg);">古琴中级班</div>
                </li>
                <li>
                    <div style="background-image: url(/img/banner-home1.jpg);">古琴高级班</div>
                </li>
                <li>
                    <div style="background-image: url(/img/banner-home1.jpg);">古研究生老师班</div>
                </li>
            </ul>
        </div>
        <?php
        if(!empty($data['data'])){
        ?>
        <ul class="experience-video">
            <?php foreach ($data['data'] as $value):?>
            <li>
                <div class="video-content">
                    <div class="hover">
                        <a href="<?=Url::to(['course/view','id'=>$value['id']])?>">
                            <div><span class="iconfont icon-bofang"></span></div>
                            <div class="hover-text">
                                <span><?=Html::encode($parent['catname'])?></span><span>在线报名</span>
                            </div>
                        </a>
                    </div>
                    <div class="experience-video-img" style="background-image: url(<?= Html::encode($value['thumb'])?>);"></div>
                </div>
                <div class="video-text">
                    <h4><?=Html::encode($value['name'])?></h4>
                    <div class="people">体验人数 <span>100</span><span class="share iconfont icon-share"></span></div>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
        <?php }?>
        <?php if($pages):?>
            <div class="page"><?= LinkPager::widget(['pagination' => $pages]);?></div>
        <?php endif;?>
    </div>
</div>
<div class="campus">
    <div class="wrap">
        <h1>CAMPUS ENVIRONMENT <span>/ 校区环境</span></h1>
        <div class="line"><span></span></div>
    </div>
    <ul class="campus-img">
        <li>
            <div style="background-image: url(/img/student/student1.jpg);"></div>
        </li>
        <li>
            <div style="background-image: url(/img/student/student3.jpg);"></div>
        </li>
        <li>
            <div style="background-image: url(/img/student/student5.jpg);"></div>
        </li>
        <li>
            <div style="background-image: url(/img/student/student-banner.jpg);"></div>
        </li>
    </ul>
    <div class="share">
        <div class="bshare-custom icon-medium-plus"><div class="bsPromo bsPromo2"></div>
            <div class="bsPromo bsPromo2"></div>
            <span style="color: #4481b8;">分享到：</span>
            <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
            <a title="分享到QQ好友" class="bshare-qqim" href="javascript:void(0);"></a>
            <a  title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a>
            <a title="分享到腾讯微博" class="bshare-qqmb"></a>
        </div>
    </div>
</div>