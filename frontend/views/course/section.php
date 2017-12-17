<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Html::encode($data['name']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($data['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($data['description'])));
$this->registerCssFile('@web/css/details.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/details.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="details">
    <div class="wrap">
        <div class="details-title"><?=Html::encode($parent['catname'])?>><?=Html::encode($data['name'])?></div>
        <div class="details-top">
            <div class="video">
                <video  controls preload="auto" width="100%">
                    <source src="<?= $detail ? $detail['video'] : '';?>" type="video/mp4">
                    <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                    <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                </video>
            </div>
        </div>
        <div class="details-bottom">
            <div class="details-tab">
                <ul class="details-tab-nav">
                    <li class="active">课程小节</li>
                </ul>
                <div class="details-tab-content">
                    <?php if($list){
                        foreach ($list as $value):?>
                            <div class="news-text">
                                <a class="more" href="<?=Url::to(['course/section','id'=>$data['id'],'sid'=>$value['id']])?>"><?=$value['name']?></a>
                                <?php if($value['subtitle']) echo "<br>——".$value['subtitle']?>
                            </div>
                        <?php endforeach;
                    }else{
                        echo '课程正在发布中，敬请期待！';
                    }?>
                </div>
            </div>
            <div class="details-teacher">
                <div class="details-teacher-title">教师简历</div>
                <div class="details-teacher-introduce">
                    <img src="<?=Html::encode($teacher['photo'])?>"/>
                    <div class="details-teacher-introduce-text">
                        <h2><?=Html::encode($teacher['realname'])?></h2>
                        <h2><?=Html::encode($teacher['title'])?></h2>
                    </div>
                </div>
                <div class="clear"></div>
                <div style="padding: 10px;">
                    <p><?=Html::encode($teacher['vitae'])?></p>
                </div>
            </div>
        </div>
    </div>
</div>