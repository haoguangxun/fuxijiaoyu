<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/about.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/about.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="about-nav">
    <div class="wrap">
        <ul>
            <li>
                <a href="#culture">
                    <span>Q</span>
                    <!--<p>1990年古琴独奏CD《落霞流水》获台北“金鼎奖”。</p>-->
                    <h5>企业文化</h5>
                </a>
            </li>
            <li>
                <a href="#business">
                    <span>X</span>
                    <!--<p>1990年古琴独奏CD《落霞流水》获台北“金鼎奖”。</p>-->
                    <h5>相关业务</h5>
                </a>
            </li>
            <li>
                <a href="#environment">
                    <span>X</span>
                    <!--<p>1990年古琴独奏CD《落霞流水》获台北“金鼎奖”。</p>-->
                    <h5>学院环境</h5>
                </a>
            </li>
            <!--<li>
                <a href="#process">
                    <span>L</span>
                    <h5>品牌历程</h5>
                </a>
            </li>-->
        </ul>
    </div>
</div>

<div id="culture" class="culture">
    <div class="wrap">
        <div class="home-title">
            <h2>CORPORATE CULTURE</h2>
            <h1><?= Html::encode($page[29]['title'])?></h1>
            <span></span>
        </div>
        <div class="about-text">
            <?= HtmlPurifier::process($page[29]['content'])?>
        </div>
        <div class="about-main">
            <ul>
                <li>
                    <div class="about-icon"><span class="iconfont icon-jiangbei"></span></div>
                    <p>不忘初心</p>
                    <p>专注打造金牌国学品质</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-kehu"></span></div>
                    <p>实力保障</p>
                    <p>顶级国学大师一对一授课</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-diannao"></span></div>
                    <p>创新模式</p>
                    <p>传统与互联网权威教学法</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-zuanshi"></span></div>
                    <p>品质服务</p>
                    <p>定期举办古琴音乐会</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="business" class="aText">
    <div class="wrap">
    	<div class="home-title">
            <h2>Related business</h2>
            <h1><?= Html::encode($page[31]['title'])?></h1>
            <span></span>
       </div>
        <?= HtmlPurifier::process($page[31]['content'])?>
    </div>
</div>

<div id="environment" class="culture">
    <div class="wrap">
        <div class="home-title">
            <h2>College environment</h2>
            <h1><?= Html::encode($page[60]['title'])?></h1>
            <span></span>
        </div>
        <div class="about-text">
            <?= HtmlPurifier::process($page[60]['content'])?>
        </div>
    </div>
</div>
