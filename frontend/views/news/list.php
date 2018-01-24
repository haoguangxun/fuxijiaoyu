<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/news.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/height.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
//$this->registerJsFile('@web/js/news.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="news">
    <div class="wrap">
        <div class="home-title">
            <h1><?= isset($pcategory['catname']) ? $pcategory['catname'] : $category['catname'];?></h1>
            <span></span>
        </div>
        <div class="system-nav">
            <a href="<?=Url::to(['news/list','cid'=>$pid])?>">
                <span <?php if($pid == 0) echo "class='active'";?>>全部</span>
            </a>
            <?php
            if(!empty($sonCategory)){
                foreach ($sonCategory as $value):
                ?>
                <a href="<?=Url::to(['news/list','cid'=>$value['id']])?>">
                    <span <?php if($cid == $value['id']) echo "class='active'";?>>
                        <?= Html::encode($value['catname'])?>
                    </span>
                </a>
                <?php endforeach;
            }?>
        </div>
    </div>
    <?php
    if(!empty($data['data'])){
    ?>
    <div class="news-list">
        <ul>
        <?php foreach ($data['data'] as $value):?>
            <li>
                <div class="wrap">
                    <div class="news-img">
                        <div style="background-image: url(<?= Html::encode($value['thumb'])?>);"></div>
                    </div>
                    <div class="news-text">
                        <div class="time"><?= date('Y-m-d',$value['addtime'])?></div>
                        <h1><?=Html::encode($value['title'])?></h1>
                        <p><?=Html::encode($value['description'])?></p>
                        <a class="more" href="<?=Url::to(['news/view','id'=>$value['id']])?>">阅读全文</a>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
        </ul>
    </div>
    <?php }?>
    <?php if($pages):?>
        <div class="page"><?= LinkPager::widget(['pagination' => $pages]);?></div>
    <?php endif;?>
</div>
