<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($data['name']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($data['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($data['description'])));
$this->registerCssFile('@web/css/details.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/details.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="details">
    <div class="wrap">
        <div class="details-title"><?=Html::encode($parent['catname'])?>><?=Html::encode($data['name'])?></div>
        <div class="details-top">
            <div class="details-top-img">
                <div class="video">
                    <div class="video-btn"><span class="iconfont icon-bofang"></span>免费试学</div>
                    <div class="img-box"><img src="<?= Html::encode($data['thumb'])?>"/></div>
                </div>
                <div class="fun">
                    <div class="share"><span class="iconfont icon-share"></span>分享</div>
                    <div class="shoucang"><span class="iconfont icon-shoucang"></span>收藏课程<em>（0）</em></div>
                    <div class="message">上课时间 07月12日 15：00-16：00</div>
                </div>
            </div>
            <div class="details-text">
                <h1><?=Html::encode($data['name'])?></h1>
                <div class="details-text-content">
                    <span>主讲老师：<?=Html::encode($teacher['realname'])?></span>
                    <span><?=Html::encode($data['subtitle'])?></span>
                </div>
                <div class="cost">
                    <div class="price">价&nbsp;&nbsp;&nbsp;格<span><?=$data['price']==0 ? '免费' : '¥'.$data['price'] ?></span></div>
                    <div class="people">报名人数<span><?=Html::encode($data['sales'])?></span>人</div>
                </div>
                <div class="down">
                    <a href="#">特色服务</a>
                    <a href="<?=Html::encode($data['data'])?>"><span class="iconfont icon-ziliao"></span>资料下载</a>
                    <a href="<?=Html::encode($data['material'])?>"><span class="iconfont icon-shu"></span>电子教材</a>
                </div>
                <div class="buttons">
                    <span class="try">免费试学</span>
                    <span class="sign"><a href="gopay.html">立即报名</a></span>
                </div>
                <div class="message">学制   |   <?=Html::encode($data['course_number'])?>节课/期    每课时<?=Html::encode($data['course_duration'])?>分钟</div>
            </div>
        </div>
        <div class="details-bottom">
            <div class="details-tab">
                <ul class="details-tab-nav">
                    <li class="active">课程详情</li>
                    <li>课程大纲</li>
                    <li>留言咨询</li>
                </ul>
                <div class="details-tab-content">
                    <?= HtmlPurifier::process($data['content'])?>
                </div>
                <div class="details-tab-content">
                    <?= HtmlPurifier::process($data['syllabus'])?>
                </div>
                <div class="details-tab-content">

                </div>
            </div>
            <div class="details-teacher">
                <div class="details-teacher-title">教师简历</div>
                <div class="details-teacher-introduce">
                    <img src="<?=Html::encode($teacher['photo'])?>"/>
                    <div class="details-teacher-introduce-text">
                        <h2><?=Html::encode($teacher['realname'])?></h2>
                        <h2><?=Html::encode($teacher['title'])?></h2>
                    </div>
                </div>
                <div class="clear"></div>
                <div style="padding: 10px;">
                    <p><?=Html::encode($teacher['vitae'])?></p>
                </div>
            </div>
        </div>
    </div>
</div>