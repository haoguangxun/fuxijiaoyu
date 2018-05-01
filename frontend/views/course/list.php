<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/curriculum.css',['depends'=>['frontend\assets\AppAsset']]);
//分享
$this->registerJsFile('http://v3.jiathis.com/code/jia.js',['depends'=>['frontend\assets\AppAsset']]);
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
                    <div class="people">体验人数 <span><?=Html::encode($value['sales'])?></span><div class="jiathis_style_32x32"><a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis iconfont icon-share" target="_blank"></a></div></div>
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
<script type="text/javascript">
	$(function(){
		$('.system .experience-video li .video-content').height($('.system .experience-video li .video-content').width()/1.5);
		$('.online li .video-content').height($('.online li .video-content').width()/1.5);
	})
	
</script>