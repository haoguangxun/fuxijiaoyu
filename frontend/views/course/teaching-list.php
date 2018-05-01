<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Html::encode($category['catname']);
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode($category['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode($category['description'])));
$this->registerCssFile('@web/css/curriculum.css',['depends'=>['frontend\assets\AppAsset']]);
//$this->registerJsFile('@web/js/online.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
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
        <!--<div class="category">
            <div class="form-select">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">最新</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">课程体系</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">内容类型</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contain">难度等级</span> <span class="iconfont icon-bottom"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                    </ul>
                </div>
            </div>
        </div>-->
    </div>
</div>
<div class="online">
    <div class="wrap">
        <ul>
            <?php
            if(!empty($data['data'])){
                foreach ($data['data'] as $value):
            ?>
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
                <div class="online-main">
                    <div class="online-main-top">
                        <div class="online-main-img"><div><img src="<?=$teacher[$value['teacherid']]['photo']?>"/></div></div>
                        <div class="online-main-text">
                            <h2><span><?=$teacher[$value['teacherid']]['realname']?></span>  <?=Html::encode($value['name'])?></h2>
                            <p><span class="iconfont icon-time"></span> <?=Html::encode($value['course_number'])?>课时<?=Html::encode($value['course_duration'])?>分钟 &nbsp;&nbsp;<span class="iconfont icon-jieti"></span> <?= Yii::$app->params['difficulty_level'][$value['difficulty_level']]?></p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="online-main-bottom">
                        <p><?= Html::encode(mb_substr($value['description'],0,36,'utf-8'))?></p>
                        <div class="xingq">
                            <a href="javascript:;"><?=Html::encode($value['sales'])?>人参与学习</a>
                        </div>
                        <div class="heng"><span></span></div>
                    </div>
                </div>
            </li>
            <?php endforeach;
            }?>
        </ul>
        <!--<div class="loading"><span><em class="iconfont icon-loading" style="margin-right: 10px;"></em>加载更多</span></div>-->
    </div>
</div>
<?php if($pages):?>
    <div class="page"><?= LinkPager::widget(['pagination' => $pages]);?></div>
<?php endif;?>
<script type="text/javascript">
	$(function(){
		$('.online li .video-content').height($('.online li .video-content').width()/1.5);
	})
</script>