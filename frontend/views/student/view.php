<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Html::encode($data['title']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($data['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($data['description'])));
$this->registerCssFile('@web/css/news.css',['depends'=>['frontend\assets\AppAsset']]);
//分享
$this->registerJsFile('http://static.bshare.cn/b/buttonLite.js#style=-1&uuid=&pophcol=2&lang=zh',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('http://static.bshare.cn/b/bshareC0.js',['depends'=>['frontend\assets\AppAsset']]);
?>
<!--内容-->
<div class="newList">
    <div class="wrap">
        <div class="newList-title">
            <h1><?=$data['title']?></h1>
            <p>浏览：<?=$data['click']?> 丨时间：<?=date('Y-m-d',$data['addtime'])?></p>
        </div>
        <div class="newList-main">
            <?php if($data['video']){?>
                <div class="video">
                    <video  controls preload="auto" width="100%">
                        <source src="<?= $data['video'];?>" type="video/mp4">
                    </video>
                </div>
            <?php }?>
            <?=$data['content']?>
        </div>
        <div class="share">
            <div class="bshare-custom icon-medium-plus"><div class="bsPromo bsPromo2"></div>
                <div class="bsPromo bsPromo2"></div>
                <span style="color: #4481b8;">分享到：</span>
                <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                <a title="分享到QQ好友" class="bshare-qqim" href="javascript:void(0);"></a>
                <a  title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a>
                <a title="分享到腾讯微博" class="bshare-qqmb"></a>
            </div>
        </div>
        <?php
        if(!empty($more)){
        ?>
        <div class="more-news">
            <h1>更多阅读</h1>
            <ul>
            <?php foreach ($more as $value):?>
                <li>
                    <h2><?=Html::encode($value['title'])?></h2>
                    <h3><?= $category['catname']?> <?= date('Y-m-d',$value['addtime'])?></h3>
                    <p><?=Html::encode(mb_substr($value['description'],0,60,'utf-8'))?><a href="<?=Url::to(['student/view','id'=>$value['id']])?>">[查看全文]</a></p>
                </li>
            <?php endforeach;?>
            </ul>
            <div class="more-btn"><a href="<?= Url::to(['student/index'])?>">返回学员成长</a></div>
        </div>
        <?php }?>
    </div>
</div>