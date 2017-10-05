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
            <p>作者：<?=$data['author']?>丨浏览：<?=$data['click']?> 丨时间：<?=date('Y-m-d',$data['addtime'])?></p>
        </div>
        <div class="newList-main">
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
        <div class="more-news">
            <h1>更多阅读</h1>
            <ul>
                <li>
                    <h2>[传家宝]藏一张传世之琴 李祥霆大师监制</h2>
                    <h3>行业新闻 2017-02-21</h3>
                    <p>通过对秋爽天高、水远沙明，雁阵的飞翔、鸣叫、盘旋、降落、起飞的种种描写，造成一幅雅致清秀的图画。使人产生安宁闲适之感<a href="news-list.html">[查看全文]</a></p>
                </li>
                <li>
                    <h2>[传家宝]藏一张传世之琴 李祥霆大师监制</h2>
                    <h3>行业新闻 2017-02-21</h3>
                    <p>通过对秋爽天高、水远沙明，雁阵的飞翔、鸣叫、盘旋、降落、起飞的种种描写，造成一幅雅致清秀的图画。使人产生安宁闲适之感<a href="news-list.html">[查看全文]</a></p>
                </li>
                <li>
                    <h2>[传家宝]藏一张传世之琴 李祥霆大师监制</h2>
                    <h3>行业新闻 2017-02-21</h3>
                    <p>通过对秋爽天高、水远沙明，雁阵的飞翔、鸣叫、盘旋、降落、起飞的种种描写，造成一幅雅致清秀的图画。使人产生安宁闲适之感<a href="news-list.html">[查看全文]</a></p>
                </li>
            </ul>
            <div class="more-btn"><a href="<?= Url::to(['news/list'])?>">返回新闻动态</a></div>
        </div>
    </div>
</div>