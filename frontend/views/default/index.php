<?php
use yii\helpers\Url;

$this->title = '伏羲教育首页';
$this->registerMetaTag(array("name"=>"keywords","content"=>"伏羲教育首页"));
$this->registerMetaTag(array("name"=>"description","content"=>"伏羲教育首页"));
$this->registerCssFile('@web/css/home.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerCssFile('@web/css/swiper.min.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/home.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/swiper.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="banner">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url(img/banner-home1.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(img/banner-home2.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(img/banner-home3.jpg);"></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="about">
    <div class="wrap">
        <div class="home-title">
            <h2>About Fu Xi</h2>
            <h1><?= $page[26]['title']?></h1>
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
        <div class="about-main course-main">
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
                    <a href="<?= $value['url'] ?>" class="course-button">咨询</a>
                </li>
                <?php
                endforeach;
                ?>
            </ul>
            <a href="<?= Url::to(['course/index'])?>" class="course-up"><span class="iconfont icon-bottom"></span></a>
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
                        <p><?= $value['title'] ?></p>
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
                <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
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
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">您的姓名</label>
                    <div class="col-sm-8">
                        <input type="input" id="name" class="form-control" maxlength="5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">联系方式</label>
                    <div class="col-sm-8">
                        <input type="input" class="form-control" id="phone" maxlength="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">是否学过琴</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="yasNo"  value="yas"> 是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="yasNo"  value="no"> 否
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">学习程度</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="degree"  value="yas"> 没有学习过
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="degree"  value="no"> 一般
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="degree"  value="yas"> 想系统学习
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">期望老师</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="4" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="sign-form-btn"><button type="button" class="btn">提交</button></div>
            </form>
        </div>
    </div>
</div>
<div class="icon-link">
    <ul>
        <li>
            <a href="#">
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
            <a href="experience.html">
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
            <a href="#">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link3.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>校区环境</h4>
                        <h5>Campus environment</h5>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
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
