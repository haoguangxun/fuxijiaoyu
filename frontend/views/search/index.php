<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = '课程搜索';
$this->registerMetaTag(array("name"=>"keywords","content"=>"课程搜索"));
$this->registerMetaTag(array("name"=>"description","content"=>"课程搜索"));
$this->registerCssFile('@web/css/experience.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/experience.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="experience">
    <div class="wrap">
        <h1><span>课程搜索</span></h1>
        <div class="line"><span></span></div>
        <div class="experience-nav" style="text-align: left;">
            关键字：<span style="color:red"><?=$keyword?></span>
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
        <?php }else{
            echo "未搜到相关课程!";
        }?>
        <?php if($pages):?>
            <div class="page"><?= LinkPager::widget(['pagination' => $pages]);?></div>
        <?php endif;?>
    </div>
</div>
