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
                <a href="#introduce">
                    <span>P</span>
                    <!--<p>1990年古琴独奏CD《落霞流水》获台北“金鼎奖”。</p>-->
                    <h5>品牌介绍</h5>
                </a>
            </li>
            <li>
                <a href="#process">
                    <span>L</span>
                    <!--<p>1990年古琴独奏CD《落霞流水》获台北“金鼎奖”。</p>-->
                    <h5>品牌历程</h5>
                </a>
            </li>
            <li>
                <a href="#culture">
                    <span>Q</span>
                    <!--<p>1990年古琴独奏CD《落霞流水》获台北“金鼎奖”。</p>-->
                    <h5>企业文化</h5>
                </a>
            </li>
            <li>
                <a href="#Memorabilia">
                    <span>D</span>
                    <!--<p>1990年古琴独奏CD《落霞流水》获台北“金鼎奖”。</p>-->
                    <h5>大事件</h5>
                </a>
            </li>
        </ul>
    </div>
</div>
<div id="introduce" class="introduce">
    <div class="wrap">
        <h1><?= Html::encode($page[27]['title'])?><span>INTROODUCE</span></h1>
        <div class="introduce-text">
            <?= HtmlPurifier::process($page[27]['content'])?>
        </div>
        <?php
        if(!empty($brandAd))?>
        <ul class="introduce-img">
            <?php
            if(!empty($brandAd)) foreach ($brandAd as $key => $value) :
                ?>
                <li>
                    <div class="introduce-img-main"  style="background-image: url(<?=$value['fileurl']?>);"></div>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
    </div>
</div>
<div id="process" class="process">
    <div class="wrap">
        <div class="home-title">
            <h2>BRAND PROCESS</h2>
            <h1>品牌历程</h1>
            <span></span>
        </div>
        <div class="process-main">
            <div class="process-main-scroll">
                <?php
                if(!empty($brandProcess1)){
                ?>
                <div class="process-main-item">
                    <div class="process-main-left">
                        <ul>
                            <?php
                            foreach ($brandProcess1 as $value) :
                            ?>
                            <li>
                                <div style="background-image: url(<?= Html::encode($value['thumb'])?>);"></div>
                            </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class="process-main-right">
                        <div class="scroll-box">
                            <ul>
                                <?php
                                foreach ($brandProcess1 as $value) :
                                    ?>
                                    <li>
                                        <a href="<?= Url::to(['news/view','id'=>$value['id']])?>"><?= Html::encode($value['title'])?></a>
                                    </li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }

                if(!empty($brandProcess2)){
                ?>
                <div class="process-main-item">
                    <div class="process-main-left">
                        <ul>
                            <?php
                            foreach ($brandProcess2 as $value) :
                                ?>
                                <li>
                                    <div style="background-image: url(<?= Html::encode($value['thumb'])?>);"></div>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class="process-main-right">
                        <div class="scroll-box">
                            <ul>
                                <?php
                                foreach ($brandProcess2 as $value) :
                                    ?>
                                    <li>
                                        <a href="<?= Url::to(['news/view','id'=>$value['id']])?>"><?= Html::encode($value['title'])?></a>
                                </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <?php
            if(!empty($brandProcess2)){
            ?>
            <div class="scroll-btn">
                <span class="btnL iconfont icon-arrowL"></span><span class="btnR iconfont icon-arrowR"></span>
            </div>
            <?php }?>
        </div>
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
<div id="Memorabilia" class="Memorabilia">
    <div class="wrap">
        <div class="home-title">
            <h2>MEMORABILIA</h2>
            <h1>大事件</h1>
            <span></span>
        </div>
        <?php
        if(!empty($memorabilia)){
        ?>
        <ul>
            <?php
            foreach ($memorabilia as $value) :
                ?>
                <li>
                    <div class="img-box">
                        <img src="<?= Html::encode($value['thumb'])?>"/>
                    </div>
                    <a href="<?= Url::to(['news/view','id'=>$value['id']])?>"><?= Html::encode($value['title'])?></a>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php }?>
    </div>
</div>
<div class="aText">
    <div class="wrap">
        <h2><?= Html::encode($page[31]['title'])?> Why choose us</h2>
        <?= HtmlPurifier::process($page[31]['content'])?>
    </div>
</div>
