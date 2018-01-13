<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/contact.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/feedback.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/bootstrap.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
//百度地图
$this->registerJsFile('http://api.map.baidu.com/api?v=2.0&ak=RSRE27K1OYhprE4kwPPs9Gm2LkgAiKm1',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
//分享
$this->registerJsFile('http://static.bshare.cn/b/buttonLite.js#style=-1&uuid=&pophcol=2&lang=zh',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('http://static.bshare.cn/b/bshareC0.js',['depends'=>['frontend\assets\AppAsset']]);
?>

<!--内容-->
<div class="list-banner" style="background-image: url(<?=Html::encode($category['pic'])?>);"></div>
<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">提示</h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
</div>
<div class="contact">
    <div class="wrap">
        <div class="home-title">
            <h2>CONTACT US</h2>
            <h1><?= Html::encode($page['title'])?></h1>
            <span></span>
        </div>
        <div class="contact-main">
            <div class="contact-input">
                <?= Html::beginForm(['feedback/post'], 'post',['id' => 'feedback-form', 'class'=>'form-horizontal']) ?>
                <div class="contact-input-left">
                    <?= Html::input('text', 'FeedbackForm[name]', '', ['id' => 'name','maxlength'=>20, 'placeholder'=>'姓名']) ?>
                    <?= Html::input('text', 'FeedbackForm[phone]', '', ['id' => 'phone','maxlength'=>20, 'placeholder'=>'手机']) ?>
                    <?= Html::input('text', 'FeedbackForm[email]', '', ['id' => 'email','maxlength'=>50, 'placeholder'=>'邮箱']) ?>
                </div>
                <div class="contact-input-right">
                    <?= Html::textarea('FeedbackForm[content]', '', ['id' => 'content', 'placeholder'=>'您想说的话','maxlength'=>200]) ?>
                    <?= Html::submitButton('提交', ['name' => 'enroll-button']) ?>
                </div>
                <?= Html::endForm() ?>
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
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(116.410759, 39.816037);
    map.centerAndZoom(point, 17);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);              // 将标注添加到地图中
</script>