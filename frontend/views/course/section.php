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
                        foreach ($list as $key => $value):?>
                            <div style="margin: 10px; padding: 10px; background-color: #f1f1f1">
                                <?=$key+1?>、
                                <?php if($value['audition']==0 && $signup==false){?>
                                    <?= $value['name']?>
                                <?php }else{?>
                                    <a class="more" href="<?=Url::to(['course/section','id'=>$data['id'],'sid'=>$value['id']])?>"><?= $value['name']?></a>
                                <?php }?>
                                <?php if($value['subtitle']) echo "——".$value['subtitle']?>
                                <?php if($value['audition'] == 1) echo "<span style='color:red;'>免费试学</span>"?>
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