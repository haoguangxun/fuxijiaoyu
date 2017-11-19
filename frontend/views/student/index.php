<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/video-js.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerCssFile('@web/css/student.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/video.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/videojs-ie8.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/student.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="student-video">
    <div class="wrap">
        <h1>伏羲学员采访</h1>
        <p>继承民族文化，弘扬中华精神。成为中国最有价值的教学机构</p>
        <!--<div class="system-nav">
            <span class="active">所有课程</span>
            <span>古琴</span>
            <span>书法</span>
            <span>绘画</span>
            <span>太极</span>
        </div>-->
        <?php
        if(!empty($interview)){
        ?>
        <ul>
            <?php foreach ($interview as $value):?>
            <li>
                <div class="video">
                    <video id="my-video" class="video-js" controls preload="auto" poster="<?=Html::encode($value['thumb'])?>" data-setup="{}">
                        <source src="<?=Html::encode($value['video'])?>" type="video/mp4">
                        <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                        <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                    </video>
                </div>
                <div class="video-text">
                    <p><?=Html::encode($value['title'])?></p>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
        <?php }?>
    </div>
</div>
<div class="student-style">
    <div class="wrap">
        <div class="home-title">
            <h2>STUDENT STYLE</h2>
            <h1>学员风采</h1>
            <span></span>
        </div>
        <div class="style-run">
            <div class="style-btn-l"><span class="iconfont icon-arrowL"></span></div>
            <div class="style-btn-r"><span class="iconfont icon-arrowR"></span></div>
            <?php
            if(!empty($style)){
            ?>
            <div class="style-run-scroll">
                <ul class="style-run-item">
                <?php foreach ($style as $key => $value):?>
                    <li>
                        <div class="main">
                            <p><?=Html::encode($value['title'])?></p>
                        </div>
                        <img src="<?=Html::encode($value['thumb'])?>"/>
                    </li>
                    <?php
                    if(($key+1)%8 == 0){
                        echo '</ul><ul class="style-run-item">';
                    }
                    ?>
                <?php endforeach;?>
                </ul>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<div class="experience">
    <div class="wrap">
        <h1>学员成长与体会</h1>
        <?php
        if(!empty($growup)){
        ?>
        <div class="experience-run">
            <ul>
            <?php foreach ($growup as $value):?>
                <li>
                    <div class="background">
                        <div class="experience-img" style="background-image: url(<?=Html::encode($value['thumb'])?>);"></div>
                        <div class="experience-text">
                            <div class="experience-text-content">
                                <h2><?=Html::encode($value['title'])?></h2>
                                <p><?=Html::encode($value['description'])?></p>
                            </div>
                            <div class="experience-text-time">
                                <h2><?= date('Y',$value['addtime']) ?></h2>
                                <h3><?= date('m-d',$value['addtime']) ?></h3>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
        <?php }?>
        <div class="experience-run-btn">
        </div>
    </div>
</div>
<div class="student-product">
    <div class="wrap">
        <h2>学员荣获奖项与作品</h2>
        <?php
        if(!empty($prize)){
        ?>
        <ul>
            <?php foreach ($prize as $value):?>
            <li>
                <div class="video">
                    <video id="my-video" class="video-js" controls preload="auto" poster="/img/video-img.jpg" data-setup="{}">
                        <source src="<?=Html::encode($value['video'])?>" type="video/mp4">
                        <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                        <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                    </video>
                </div>
                <div class="video-text">
                    <p><?=Html::encode($value['title'])?></p>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
        <?php }?>
    </div>
</div>