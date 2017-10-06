<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/curriculum.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/height.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="teacher">
    <div class="wrap">
        <div class="home-title">
            <h2>TEACHER FORCE</h2>
            <h1>师资力量</h1>
            <span></span>
        </div>
        <div class="system-nav">
            <a href="<?=Url::to(['teacher/list'])?>">
                <span <?php if($cid == 2) echo "class='active'";?>>所有课程</span>
            </a>
            <?php
            if(!empty($sonCategory)){
                foreach ($sonCategory as $value):
                    ?>
                    <a href="<?=Url::to(['teacher/list','cid'=>$value['id']])?>">
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
    <div class="teacher-show">
        <ul>
        <?php foreach ($data['data'] as $value):?>
            <li>
                <h2><?=Html::encode($value['name'])?></h2>
                <h3><?=Html::encode($value['subtitle'])?></h3>
                <div class="teacher-img"><div style="background-image:url(<?= Html::encode($value['thumb'])?>)"></div></div>
                <p><?=Html::encode($value['description'])?></p>
                <div  class="more">
                    <a href="<?=Url::to(['teacher/view','id'=>$value['id']])?>">查看详情<a>
                </div>
            </li>
        <?php endforeach;?>
        </ul>
        <!--<div class="loading"><span><em class="iconfont icon-loading" style="margin-right: 10px;"></em>加载更多</span></div>-->
    </div>
    <?php }?>
    <?php if($pages):?>
        <div class="page"><?= LinkPager::widget(['pagination' => $pages]);?></div>
    <?php endif;?>
</div>