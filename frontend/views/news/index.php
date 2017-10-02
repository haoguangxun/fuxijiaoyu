<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/news.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/height.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/news.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="news">
    <div class="wrap">
        <div class="home-title">
            <h1>新闻动态</h1>
            <span></span>
        </div>
        <div class="system-nav">
            <span class="active">全部</span>
            <span>行业动态</span>
            <span>最新动态</span>
            <span>媒体关注</span>
        </div>
    </div>
    <div class="news-list">
        <ul>
            <li>
                <div class="wrap">
                    <div class="news-img">
                        <div style="background-image: url(img/course02.jpg);"></div>
                    </div>
                    <div class="news-text">
                        <div class="time">2017-07-06</div>
                        <h1>李祥霆：古琴，喜欢就能学会，入迷就能学好，发疯就能学精</h1>
                        <p>中艺伏羲古琴文化有限公司籍琴聚友，传播广褒中华文化，以清幽脱俗的古琴精髓结合悠久的中国文化，传播“人类非物质文化遗产代表-------古琴琴学”。更以关注人文修养，继承、研究为主体，兼及中国传统文化至宝：书法、绘画、茶道、香道、太极拳等。并开展相应的艺术、学术及众多教学活动：如，复制古代名琴（李祥霆督造）、宝玺（多吉监制）；研制与古琴艺术、书画茶道、香道、太极拳相关用具、文玩、玉佩等。形成中华民族多元文化与一体教育观的继承与发展。锻造深具综合实力的古琴文化传播机构，叩开现代文明与中华渊源的连接之门......</p>
                        <a class="more" href="news-list.html">阅读全文</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="wrap">
                    <div class="news-img">
                        <div style="background-image: url(img/course01.jpg);"></div>
                    </div>
                    <div class="news-text">
                        <div class="time">2017-07-06</div>
                        <h1>李祥霆：古琴，喜欢就能学会，入迷就能学好，发疯就能学精</h1>
                        <p>中艺伏羲古琴文化有限公司籍琴聚友，传播广褒中华文化，以清幽脱俗的古琴精髓结合悠久的中国文化，传播“人类非物质文化遗产代表-------古琴琴学”。更以关注人文修养，继承、研究为主体，兼及中国传统文化至宝：书法、绘画、茶道、香道、太极拳等。并开展相应的艺术、学术及众多教学活动：如，复制古代名琴（李祥霆督造）、宝玺（多吉监制）；研制与古琴艺术、书画茶道、香道、太极拳相关用具、文玩、玉佩等。形成中华民族多元文化与一体教育观的继承与发展。锻造深具综合实力的古琴文化传播机构，叩开现代文明与中华渊源的连接之门......</p>
                        <a class="more" href="news-list.html">阅读全文</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="wrap">
                    <div class="news-img">
                        <div style="background-image: url(img/course03.jpg);"></div>
                    </div>
                    <div class="news-text">
                        <div class="time">2017-07-06</div>
                        <h1>李祥霆：古琴，喜欢就能学会，入迷就能学好，发疯就能学精</h1>
                        <p>中艺伏羲古琴文化有限公司籍琴聚友，传播广褒中华文化，以清幽脱俗的古琴精髓结合悠久的中国文化，传播“人类非物质文化遗产代表-------古琴琴学”。更以关注人文修养，继承、研究为主体，兼及中国传统文化至宝：书法、绘画、茶道、香道、太极拳等。并开展相应的艺术、学术及众多教学活动：如，复制古代名琴（李祥霆督造）、宝玺（多吉监制）；研制与古琴艺术、书画茶道、香道、太极拳相关用具、文玩、玉佩等。形成中华民族多元文化与一体教育观的继承与发展。锻造深具综合实力的古琴文化传播机构，叩开现代文明与中华渊源的连接之门......</p>
                        <a class="more" href="news-list.html">阅读全文</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
