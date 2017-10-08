<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/experience.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerCssFile('@web/css/video-js.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/experience.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/video.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/videojs-ie8.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="experience">
    <div class="wrap">
        <h1><?=Html::encode($parent['en_catname'])?> <span>/ <?=Html::encode($parent['catname'])?></span></h1>
        <div class="line"><span></span></div>
        <div class="experience-nav">
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
                    <div class="people">体验人数 <span><?=Html::encode($value['sales'])?></span><span class="share iconfont icon-share"></span></div>
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
<div class="popular">
    <div class="wrap">
        <div class="popular-title">
            <div class="popular-title-name">热门课程</div>
        </div>
        <div class="popular-main">
            <div class="popular-btn">
                <span class="popular-l iconfont icon-arrowL"></span>
            </div>
            <div class="popular-scroll">
                <ul >
                    <?php foreach ($hot as $value):?>
                    <li>
                        <a href="<?=Url::to(['course/view','id'=>$value['id']])?>">
                            <div class="popular-img">
                                <div style="background-image:url(<?= Html::encode($value['thumb'])?>);"></div>
                            </div>
                        </a>
                        <div class="popular-img-text"><?=Html::encode($value['name'])?></div>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="popular-btn">
                <span class="popular-r iconfont icon-arrowR"></span>
            </div>
        </div>
    </div>
</div>
<div class="welcome">
    <div class="wrap">
        <h1><?= Html::encode($page[47]['title'])?></h1>
        <p><?= Html::encode($page[47]['subtitle'])?></p>
        <div class="line"><span></span></div>
        <?= HtmlPurifier::process($page[47]['content'])?>
    </div>
</div>