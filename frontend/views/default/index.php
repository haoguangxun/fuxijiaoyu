<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '首页';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/home.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerCssFile('@web/css/swiper.min.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/home.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/swiper.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/bootstrap.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="banner">
    <div id="ban" class="swiper-container" style="height:100%">
        <div class="swiper-wrapper">
            <?php
            if(!empty($ad)) foreach ($ad as $key => $value) :
            ?>
            <div class="swiper-slide"><a href="<?=$value['linkurl']?>"><img src="<?=$value['fileurl']?>"/></a></div>
            <?php
            endforeach;
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="about">
    <div class="wrap">
        <div class="home-title">
            <h2>About Fu Xi</h2>
            <h1><?= Html::encode($page[26]['title'])?></h1>
            <span></span>
        </div>
        <div class="about-text">
            <?= $page[26]['content']?>
        </div>
        <div class="about-main">
            <ul>
                <li>
                    <div class="about-icon"><span class="iconfont icon-jiangbei"></span></div>
                    <p>不忘初心</p>
                    <p>专注打造金牌国学品质</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-kehu"></span></div>
                    <p>实力保障</p>
                    <p>顶级国学大师一对一授课</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-diannao"></span></div>
                    <p>创新模式</p>
                    <p>传统与互联网权威教学法</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-zuanshi"></span></div>
                    <p>品质服务</p>
                    <p>定期举办古琴音乐会</p>
                </li>
            </ul>
            <a href="<?= Url::to(['about/index'])?>" class="about-button">了解更多</a>
        </div>
    </div>
</div>
<div class="course">
    <div class="wrap">
        <div class="home-title">
            <h2>Curriculum system</h2>
            <h1>课程体系</h1>
            <span></span>
        </div>
        <div class="swiper-container mabout-main" id="fls">
            <ul class="swiper-wrapper">
                <?php
                if(!empty($curriculumSystem)) foreach ($curriculumSystem as $key => $value) :
                    ?>
                    <li class="swiper-slide">
                        <div class="course-icon">
                            <span style="background-image: url(<?= $value['thumb'] ?>);"></span>
                        </div>
                        <span class="course-top"><?= $value['title'] ?></span>
                        <p><?= $value['subtitle'] ?></p>
                        <a href="tencent://message/?uin=2733086100&amp;Site=QQ咨询&amp;Menu=yes" class="course-button">咨询</a>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </div>
        <div class="about-main course-main" id="pcMain">
            <ul>
                <?php
                if(!empty($curriculumSystem)) foreach ($curriculumSystem as $key => $value) :
                ?>
                <li>
                    <div class="course-icon">
                        <span style="background-image: url(<?= $value['thumb'] ?>);"></span>
                    </div>
                    <span class="course-top"><?= $value['title'] ?></span>
                    <p><?= $value['subtitle'] ?></p>
                    <a href="tencent://message/?uin=2733086100&amp;Site=QQ咨询&amp;Menu=yes" class="course-button">咨询</a>
                </li>
                <?php
                endforeach;
                ?>
            </ul>
            <a href="<?= Url::to(['course/list','cid'=>15])?>" class="course-up"><span class="iconfont icon-bottom"></span></a>
            <div class="arrow">
                <div class="arrow-l"></div>
                <div class="arrow-r"></div>
            </div>
        </div>
    </div>
</div>
<div class="teachers">
    <div class="wrap">
        <div class="home-title">
            <h2>Teacher force</h2>
            <h1><?= $page[36]['title']?></h1>
        </div>
        <div class="about-text">
            <?= $page[36]['content']?>
        </div>
        <div class="teachers-banner">
            <ul>
                <?php
                if(!empty($teacherList)) foreach ($teacherList as $key => $value) :
                ?>
                <li>
                    <div class="main">
                        <p><?= $value['name'] ?></p>
                        <p><?= $value['subtitle'] ?></p>
                        <div class="more"><a href="<?= Url::to(['teacher/view','id'=>$value['id']])?>">+</a></div>
                    </div>
                    <img src="<?= $value['thumb'] ?>"/>
                </li>
                <?php
                if(($key+1)%8 == 0){
                    echo '</ul><ul>';
                }
                endforeach;
                ?>
            </ul>
            <div class="pagination"></div>
        </div>
    </div>
</div>
</div>
<div class="grow-scroll">
    <div class="grow">
        <div class="video">
            <div class="video-img-show"><span class="iconfont icon-bofang"></span><img src="<?= $page[37]['thumb']?>"/></div>
            <video  controls preload="auto">
                <source src="<?= $page[37]['video']?>" type="video/mp4">
            </video>
        </div>
        <div class="video-more">
            <div class="video-icon"><span class="iconfont icon-bofang"></span></div>
            <div class="home-title">
                <h2>Student growth</h2>
                <h1><?= $page[37]['title']?></h1>
                <span></span>
            </div>
            <?= $page[37]['content']?>
            <a href="<?= Url::to(['student/index'])?>" class="video-more-btn">查看更多</a>
        </div>
    </div>
</div>
<div class="grow-banner">
    <div class="wrap">
        <h1>古琴曲，曲风独特，意味悠长，学员体会分享给大家，趣味古琴曲赏析，一起感受《流水》的魅力吧！</h1>
        <h2>《流水》班学员体会与感受</h2>
        <div class="grow-banner-main">
            <div class="grow-banner-l"></div>
            <div class="grow-banner-scroll">
                <ul>
                    <?php
                    if(!empty($studentExperience)) foreach ($studentExperience as $key => $value) :
                    ?>
                    <li>
                        <div class="grow-banner-main-img" style="background-image: url(<?= $value['thumb'] ?>);"></div>
                        <div class="grow-banner-main-icon"></div>
                        <div class="grow-banner-main-text"><?= $value['description'] ?></div>
                    </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
            <div class="grow-banner-r"></div>
        </div>
    </div>
</div>
<div class="news">
    <div class="wrap">
        <div class="home-title">
            <h2>News information</h2>
            <h1>新闻动态</h1>
            <span></span>
        </div>
        <div class="news-main">
            <ul>
                <li>
                    <div class="news-img">
                        <?php
                        if(!empty($industryTrendsPic)) foreach ($industryTrendsPic as $key => $value) :
                        ?>
                        <div class="img" style="background-image: url(<?= $value['thumb'] ?>);"></div>
                        <h1><?= $value['title'] ?></h1>
                        <p><?= $value['description'] ?></p>
                        <a href="<?= Url::to(['news/view','id'=>$value['id']])?>" class="news-list">查看详情</a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <div class="news-text">
                        <?php
                        if(!empty($industryTrends)) foreach ($industryTrends as $key => $value) :
                        ?>
                        <a href="<?= Url::to(['news/view','id'=>$value['id']])?>">
                        <div class="item">
                            <div class="news-text-time">
                                <h4><?= date('m',$value['addtime']) ?></h4>
                                <h5><?= date('Y-m-d',$value['addtime']) ?></h5>
                            </div>
                            <div class="news-text-contain">
                                <h2><?= $value['title'] ?></h2>
                                <p><?= $value['description'] ?></p>
                            </div>
                        </div>
                        </a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </li>
                <li>
                    <div class="news-img">
                        <?php
                        if(!empty($industryTrendsPic)) foreach ($industryTrendsPic as $key => $value) :
                        ?>
                        <div class="img"><img src="<?= $value['thumb'] ?>"/></div>
                        <h1><?= $value['title'] ?></h1>
                        <p><?= $value['description'] ?></p>
                        <a href="<?= Url::to(['news/view','id'=>$value['id']])?>" class="news-list">查看详情</a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <div class="news-text">
                        <?php
                        if(!empty($industryTrends)) foreach ($industryTrends as $key => $value) :
                        ?>
                        <a href="<?= Url::to(['news/view','id'=>$value['id']])?>">
                        <div class="item">
                            <div class="news-text-time">
                                <h4><?= date('m',$value['addtime']) ?></h4>
                                <h5><?= date('Y-m-d',$value['addtime']) ?></h5>
                            </div>
                            <div class="news-text-contain">
                                <h2><?= $value['title'] ?></h2>
                                <p><?= $value['description'] ?></p>
                            </div>
                        </div>
                        </a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </li>
            </ul>
            <div class="news-main-btn">
                <div>
                    <div class="news-main-btn-l"><span class="iconfont icon-arrowL"></span></div>
                    <div class="news-main-btn-r"><span class="iconfont icon-arrowR"></span></div>
                </div>
                <a href="<?= Url::to(['news/list','cid'=>4])?>">查看更多</a>
            </div>
        </div>
    </div>
</div>
<div class="baoming"><img src="<?= $page[32]['thumb']?>"/></div>
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
<div class="sign">
    <div class="wrap">
        <div class="sign-text">
            <div class="home-title">
                <h1><?= $page[32]['title']?></h1>
                <span></span>
            </div>
            <?= $page[32]['content']?>
        </div>
        <div class="sign-form">
            <?= Html::beginForm(['enroll/post'], 'post',['id' => 'enroll-form', 'class'=>'form-horizontal']) ?>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">您的姓名</label>
                    <div class="col-sm-8">
                        <?= Html::input('text', 'EnrollForm[name]', '', ['id' => 'name','class'=>'form-control','maxlength'=>20]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">联系方式</label>
                    <div class="col-sm-8">
                        <?= Html::input('text', 'EnrollForm[contact]', '', ['id' => 'contact','class'=>'form-control','maxlength'=>20]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="learn" class="col-sm-2 control-label">是否学过琴</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <?= Html::input('radio', 'EnrollForm[learn]', 1) ?> 是
                        </label>
                        <label class="radio-inline">
                            <?= Html::input('radio', 'EnrollForm[learn]', 0, ['checked' => 'checked']) ?> 否
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="learning_level" class="col-sm-2 control-label">学习程度</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <?= Html::input('radio', 'EnrollForm[learning_level]', 1, ['checked' => 'checked']) ?> 没有学习过
                        </label>
                        <label class="radio-inline">
                            <?= Html::input('radio', 'EnrollForm[learning_level]', 2) ?> 一般
                        </label>
                        <label class="radio-inline">
                            <?= Html::input('radio', 'EnrollForm[learning_level]', 3) ?> 想系统学习
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="expect_teacher" class="col-sm-2 control-label">期望老师</label>
                    <div class="col-sm-8">
                        <?= Html::textarea('EnrollForm[expect_teacher]', '', ['id' => 'expect_teacher','class'=>'form-control','rows'=>4,'maxlength'=>30,'style'=>'resize: none;']) ?>
                    </div>
                </div>
                <div class="sign-form-btn"><?= Html::submitButton('提交', ['class' => 'btn', 'name' => 'enroll-button']) ?></div>
            <?= Html::endForm() ?>
        </div>
    </div>
</div>
<div class="icon-link">
    <ul>
        <li>
            <a href="<?= Url::to(['page/index','cid'=>57])?>">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link1.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>伏羲帮助</h4>
                        <h5>Fu Xi help</h5>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['news/list','cid'=>42])?>">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link2.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>伏羲体验</h4>
                        <h5>Fu Xi experience</h5>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['about/index'])?>#environment">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link3.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>学院环境</h4>
                        <h5>College environment</h5>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['about/index'])?>">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link4.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>品牌关注</h4>
                        <h5>Brand concern</h5>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>
