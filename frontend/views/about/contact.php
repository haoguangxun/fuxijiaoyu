<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/contact.css',['depends'=>['frontend\assets\AppAsset']]);
//百度地图
$this->registerJsFile('http://api.map.baidu.com/api?v=2.0&ak=RSRE27K1OYhprE4kwPPs9Gm2LkgAiKm1',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
//分享
$this->registerJsFile('http://static.bshare.cn/b/buttonLite.js#style=-1&uuid=&pophcol=2&lang=zh',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('http://static.bshare.cn/b/bshareC0.js',['depends'=>['frontend\assets\AppAsset']]);
?>

<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="contact">
    <div class="wrap">
        <div class="home-title">
            <h2>CONTACT US</h2>
            <h1><?= Html::encode($page['title'])?></h1>
            <span></span>
        </div>
        <div class="contact-main">
            <div class="contact-input">
                <div class="contact-input-left">
                    <input type="text" placeholder="姓名" />
                    <input type="text" placeholder="手机" />
                    <input type="email" placeholder="邮箱" />
                </div>
                <div class="contact-input-right">
                    <textarea placeholder="您想说的话"></textarea>
                    <button>提交</button>
                </div>
                <div class="clear"></div>
                <div class="contact-share">
                    <div class="ewm">
                        <img src="/img/ewm.png">
                        <p>关注伏羲微信</p>
                    </div>
                </div>
                <div class="share-btn">
                    <div class="bshare-custom icon-medium-plus">
                        <div class="bsPromo bsPromo2"></div>
                        <a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a>
                        <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                        <a title="分享到QQ好友" class="bshare-qqim" href="javascript:void(0);"></a>
                        <a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a>
                        <a title="分享到腾讯微博" class="bshare-qqmb"></a>
                    </div>
                </div>
            </div>
            <div class="contact-text">
                <?= HtmlPurifier::process($page['content'])?>
            </div>
        </div>
    </div>
</div>
<div id="allmap" ></div>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>